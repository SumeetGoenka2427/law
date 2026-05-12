<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdvertisementRequest;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::latest()->paginate(20);
        return view('admin.advertisements.index', compact('advertisements'));
    }

    public function create()
    {
        return view('admin.advertisements.create');
    }

    public function store(AdvertisementRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('ads', 'public');
        }

        Advertisement::create($data);

        return redirect()->route('admin.advertisements.index')->with('success', 'Advertisement created successfully.');
    }

    public function show(Advertisement $advertisement)
    {
        return redirect()->route('admin.advertisements.edit', $advertisement);
    }

    public function edit(Advertisement $advertisement)
    {
        return view('admin.advertisements.edit', compact('advertisement'));
    }

    public function update(AdvertisementRequest $request, Advertisement $advertisement)
    {
        $data = $request->validated();

        if ($request->boolean('remove_image')) {
            if ($advertisement->image) Storage::disk('public')->delete($advertisement->image);
            $data['image'] = null;
        } elseif ($request->hasFile('image')) {
            if ($advertisement->image) Storage::disk('public')->delete($advertisement->image);
            $data['image'] = $request->file('image')->store('ads', 'public');
        }

        $advertisement->update($data);

        return redirect()->route('admin.advertisements.index')->with('success', 'Advertisement updated successfully.');
    }

    public function destroy(Advertisement $advertisement)
    {
        if ($advertisement->image) Storage::disk('public')->delete($advertisement->image);
        $advertisement->delete();
        return redirect()->route('admin.advertisements.index')->with('success', 'Advertisement deleted.');
    }
}
