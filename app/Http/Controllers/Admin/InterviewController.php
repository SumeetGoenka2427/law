<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InterviewRequest;
use App\Models\Interview;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::with('author')->latest()->paginate(20);
        return view('admin.interviews.index', compact('interviews'));
    }

    public function create()
    {
        $authors = Author::where('is_active', true)->orderBy('name')->get();
        return view('admin.interviews.create', compact('authors'));
    }

    public function store(InterviewRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('interviews', 'public');
        }

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        Interview::create($data);

        return redirect()->route('admin.interviews.index')->with('success', 'Interview created successfully.');
    }

    public function show(Interview $interview)
    {
        return redirect()->route('admin.interviews.edit', $interview);
    }

    public function edit(Interview $interview)
    {
        $authors = Author::where('is_active', true)->orderBy('name')->get();
        return view('admin.interviews.edit', compact('interview', 'authors'));
    }

    public function update(InterviewRequest $request, Interview $interview)
    {
        $data = $request->validated();

        if ($request->boolean('remove_image')) {
            if ($interview->image) Storage::disk('public')->delete($interview->image);
            $data['image'] = null;
        } elseif ($request->hasFile('image')) {
            if ($interview->image) Storage::disk('public')->delete($interview->image);
            $data['image'] = $request->file('image')->store('interviews', 'public');
        }

        if ($data['status'] === 'published' && empty($interview->published_at)) {
            $data['published_at'] = now();
        }

        $interview->update($data);

        return redirect()->route('admin.interviews.index')->with('success', 'Interview updated successfully.');
    }

    public function destroy(Interview $interview)
    {
        if ($interview->image) Storage::disk('public')->delete($interview->image);
        $interview->delete();
        return redirect()->route('admin.interviews.index')->with('success', 'Interview deleted.');
    }
}
