<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['banners'] = Banner::get();
        return view('admin.banners.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'button' => 'required',
        ]);
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/uploads', $fileName);

        $saveData = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'button' => $request->button,
            'image' => $fileName
        ];
        Banner::create($saveData);

        try {
            // Your save logic here

            return redirect()->route('admin.banners')->with('success', 'Banners has been created successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.banners')->with('error', 'Error creating the banner. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.show', compact('banner'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.edit', compact('banner'));

    }

    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $fileName = '';
    $editData = Banner::find($id);
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
        'description' => $request->description,
        'button' => $request->button,
        'image' => $fileName
    ];

    $updateSuccess = $editData->update($editDataRecord);

    try {
        if ($updateSuccess) {
            return redirect()->route('admin.banners', $id)->with('success', 'Banner has been updated successfully.');
        } else {
            return redirect()->route('admin.banners', $id)->with('error', 'Error updating the banner. Please try again.');
        }
    } catch (\Exception $e) {
        // Handle any exceptions or errors
        return redirect()->route('admin.banners', $id)->with('error', 'Error updating the banner. Please try again.');
    }
}


    /**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    try {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banners')->with('error', 'Banner not found.');
        }

        // Delete the banner and its associated image
        Storage::delete('public/uploads/' . $banner->image);
        $banner->delete();

        return redirect()->route('admin.banners')->with('success', 'Banner has been deleted successfully.');
    } catch (\Exception $e) {
        // Handle any exceptions or errors
        return redirect()->route('admin.banners')->with('error', 'Error deleting the banner. Please try again.');
    }
}
}
