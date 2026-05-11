<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JudgmentRequest;
use App\Models\Judgment;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class JudgmentController extends Controller
{
    public function index()
    {
        $judgments = Judgment::with('category')->latest()->paginate(20);
        return view('admin.judgments.index', compact('judgments'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.judgments.create', compact('categories'));
    }

    public function store(JudgmentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('pdf_file')) {
            $data['pdf_file'] = $request->file('pdf_file')->store('judgments/pdfs', 'public');
        }

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        Judgment::create($data);

        return redirect()->route('admin.judgments.index')->with('success', 'Judgment created successfully.');
    }

    public function show(Judgment $judgment)
    {
        return redirect()->route('admin.judgments.edit', $judgment);
    }

    public function edit(Judgment $judgment)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.judgments.edit', compact('judgment', 'categories'));
    }

    public function update(JudgmentRequest $request, Judgment $judgment)
    {
        $data = $request->validated();

        if ($request->hasFile('pdf_file')) {
            if ($judgment->pdf_file) Storage::disk('public')->delete($judgment->pdf_file);
            $data['pdf_file'] = $request->file('pdf_file')->store('judgments/pdfs', 'public');
        }

        if ($data['status'] === 'published' && empty($judgment->published_at)) {
            $data['published_at'] = now();
        }

        $judgment->update($data);

        return redirect()->route('admin.judgments.index')->with('success', 'Judgment updated successfully.');
    }

    public function destroy(Judgment $judgment)
    {
        if ($judgment->pdf_file) Storage::disk('public')->delete($judgment->pdf_file);
        $judgment->delete();
        return redirect()->route('admin.judgments.index')->with('success', 'Judgment deleted.');
    }
}
