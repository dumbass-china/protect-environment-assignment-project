<?php

namespace App\Http\Controllers\Admin;

use App\Models\WhatWeDo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WhatWeDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['whatwedo'] = WhatWeDo::get();
        return view('admin.whatwedo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.whatwedo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'picturetitle' => 'required',
            'picturedescription' => 'required',
            'button' => 'required',
        ]);

        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/uploads', $fileName);

        $saveData = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'picturetitle' => $request->picturetitle,
            'picturedescription' => $request->picturedescription,
            'button' => $request->button,
            'image' => $fileName
        ];

        WhatWeDo::create($saveData);

        try
        {
            // Your save logic here
            return redirect()->route('admin.whatwedo')->with('success', 'WhatWeDo have been created successfully.');
        }
        catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.whatwedo')->with('error', 'Error creating the whatwedo. Please try again.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $whatwedo = WhatWeDo::find($id);
        return view('admin.whatwedo.show', compact('whatwedo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $whatwedo = WhatWeDo::find($id);
        return view('admin.whatwedo.edit', compact('whatwedo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fileName = '';
    $editData = WhatWeDo::find($id);
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/uploads', $fileName);
        if ($editData->image) {
            Storage::delete('public/uploads/' . $editData->image);
        }
    } else {
        $fileName = $request->old_image;
    }

    $editDataRecord = [
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'picturetitle' => $request->picturetitle,
        'picturedescription' => $request->picturedescription,
        'button' => $request->button,
        'image' => $fileName
    ];

    $updateSuccess = $editData->update($editDataRecord);

    try {
        if ($updateSuccess) {
            return redirect()->route('admin.whatwedo', $id)->with('success', 'Whatwedo has been updated successfully.');
        } else {
            return redirect()->route('admin.whatwedo', $id)->with('error', 'Error updating the whatwedo. Please try again.');
        }
    } catch (\Exception $e) {
        // Handle any exceptions or errors
        return redirect()->route('admin.whatwedo', $id)->with('error', 'Error updating the whatwedo. Please try again.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $whatwedo = WhatWeDo::find($id);
            if (!$whatwedo) {
                return redirect()->route('admin.whatwedo')->with('error', 'Whatwedo not found.');
            }

            // Delete the banner and its associated image
            Storage::delete('public/uploads/' . $whatwedo->image);
            $whatwedo->delete();

            return redirect()->route('admin.whatwedo')->with('success', 'Whatwedo has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.whatwedo')->with('error', 'Error deleting the whatwedo. Please try again.');
        }
    }
}
