<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OpinionRequest;
use App\Models\Opinion;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class OpinionController extends Controller
{
    public function index()
    {
        $opinions = Opinion::with('author')->latest()->paginate(20);
        return view('admin.opinions.index', compact('opinions'));
    }

    public function create()
    {
        $authors = Author::where('is_active', true)->orderBy('name')->get();
        return view('admin.opinions.create', compact('authors'));
    }

    public function store(OpinionRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('opinions', 'public');
        }

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        Opinion::create($data);

        return redirect()->route('admin.opinions.index')->with('success', 'Opinion created successfully.');
    }

    public function show(Opinion $opinion)
    {
        return redirect()->route('admin.opinions.edit', $opinion);
    }

    public function edit(Opinion $opinion)
    {
        $authors = Author::where('is_active', true)->orderBy('name')->get();
        return view('admin.opinions.edit', compact('opinion', 'authors'));
    }

    public function update(OpinionRequest $request, Opinion $opinion)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($opinion->image) Storage::disk('public')->delete($opinion->image);
            $data['image'] = $request->file('image')->store('opinions', 'public');
        }

        if ($data['status'] === 'published' && empty($opinion->published_at)) {
            $data['published_at'] = now();
        }

        $opinion->update($data);

        return redirect()->route('admin.opinions.index')->with('success', 'Opinion updated successfully.');
    }

    public function destroy(Opinion $opinion)
    {
        if ($opinion->image) Storage::disk('public')->delete($opinion->image);
        $opinion->delete();
        return redirect()->route('admin.opinions.index')->with('success', 'Opinion deleted.');
    }
}
