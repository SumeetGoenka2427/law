<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'author'])->latest()->paginate(20);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $authors    = Author::where('is_active', true)->orderBy('name')->get();
        $tags       = Tag::orderBy('name')->get();
        return view('admin.articles.create', compact('categories', 'authors', 'tags'));
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        $article = Article::create($data);

        if ($request->filled('tags')) {
            $article->tags()->sync($request->input('tags'));
        }

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    public function show(Article $article)
    {
        return redirect()->route('admin.articles.edit', $article);
    }

    public function edit(Article $article)
    {
        $categories = Category::orderBy('name')->get();
        $authors    = Author::where('is_active', true)->orderBy('name')->get();
        $tags       = Tag::orderBy('name')->get();
        return view('admin.articles.edit', compact('article', 'categories', 'authors', 'tags'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($article->image) Storage::disk('public')->delete($article->image);
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        if ($data['status'] === 'published' && empty($article->published_at)) {
            $data['published_at'] = now();
        }

        $article->update($data);

        if ($request->has('tags')) {
            $article->tags()->sync($request->input('tags', []));
        }

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        if ($article->image) Storage::disk('public')->delete($article->image);
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted.');
    }
}
