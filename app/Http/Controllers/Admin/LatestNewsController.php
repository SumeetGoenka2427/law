<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LatestNewsRequest;
use App\Models\LatestNews;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class LatestNewsController extends Controller
{
    public function index()
    {
        $news = LatestNews::with(['category', 'author'])->latest()->paginate(20);
        return view('admin.latest-news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $authors    = Author::where('is_active', true)->orderBy('name')->get();
        return view('admin.latest-news.create', compact('categories', 'authors'));
    }

    public function store(LatestNewsRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        LatestNews::create($data);

        return redirect()->route('admin.latest-news.index')->with('success', 'News item created successfully.');
    }

    public function show(LatestNews $latestNews)
    {
        return redirect()->route('admin.latest-news.edit', $latestNews);
    }

    public function edit(LatestNews $latestNews)
    {
        $categories = Category::orderBy('name')->get();
        $authors    = Author::where('is_active', true)->orderBy('name')->get();
        return view('admin.latest-news.edit', compact('latestNews', 'categories', 'authors'));
    }

    public function update(LatestNewsRequest $request, LatestNews $latestNews)
    {
        $data = $request->validated();

        if ($request->boolean('remove_image')) {
            if ($latestNews->image) Storage::disk('public')->delete($latestNews->image);
            $data['image'] = null;
        } elseif ($request->hasFile('image')) {
            if ($latestNews->image) Storage::disk('public')->delete($latestNews->image);
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if ($data['status'] === 'published' && empty($latestNews->published_at)) {
            $data['published_at'] = now();
        }

        $latestNews->update($data);

        return redirect()->route('admin.latest-news.index')->with('success', 'News item updated successfully.');
    }

    public function destroy(LatestNews $latestNews)
    {
        if ($latestNews->image) Storage::disk('public')->delete($latestNews->image);
        $latestNews->delete();
        return redirect()->route('admin.latest-news.index')->with('success', 'News item deleted.');
    }
}
