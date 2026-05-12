<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->paginate(20);
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(AuthorRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('authors', 'public');
        }

        Author::create($data);

        return redirect()->route('admin.authors.index')->with('success', 'Author created successfully.');
    }

    public function show(Author $author)
    {
        return redirect()->route('admin.authors.edit', $author);
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $data = $request->validated();

        if ($request->boolean('remove_image')) {
            if ($author->image) Storage::disk('public')->delete($author->image);
            $data['image'] = null;
        } elseif ($request->hasFile('image')) {
            if ($author->image) Storage::disk('public')->delete($author->image);
            $data['image'] = $request->file('image')->store('authors', 'public');
        }

        $author->update($data);

        return redirect()->route('admin.authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author)
    {
        if ($author->image) Storage::disk('public')->delete($author->image);
        $author->delete();
        return redirect()->route('admin.authors.index')->with('success', 'Author deleted.');
    }
}
