<?php

namespace App\Http\Controllers\Admin;

use App\Models\RecentCauses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RecentCausesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['recentcauses'] = RecentCauses::get();
        return view('admin.recentcauses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.recentcauses.create');
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
            'boxtitle' => 'required',
            'boxdescription' => 'required',
            'goal' => 'required',
            'raised' => 'required',
            'percentage' => 'required',
            'button1' => 'required',
            'button2' => 'required',
        ]);

        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/uploads', $fileName);

        $saveData = [
            'title' => $request->title,
            'subtitle' => $request->description,
            'description' => $request->description,
            'boxtitle' => $request->boxtitle,
            'boxdescription' => $request->boxdescription,
            'goal' => $request->goal,
            'raised' => $request->raised,
            'percentage' => $request->percentage,
            'button1' => $request->button1,
            'button2' => $request->button2,
            'image' => $fileName
        ];

        RecentCauses::create($saveData);

        try {
            // Your save logic here
            return redirect()->route('admin.recentcauses')->with('success', 'recentcauses have been created successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.recentcauses')->with('error', 'Error creating the recentcauses. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recentcauses = RecentCauses::find($id);
        return view('admin.recentcauses.show', compact('recentcauses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recentcauses = RecentCauses::find($id);
        return view('admin.recentcauses.edit', compact('recentcauses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fileName = '';
        $editData = RecentCauses::find($id);
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
            'boxtitle' => $request->boxtitle,
            'boxdescription' => $request->boxdescription,
            'goal' => $request->goal,
            'raised' => $request->raised,
            'percentage' => $request->percentage,
            'button1' => $request->button1,
            'button2' => $request->button2,
            'image' => $fileName,
        ];

        $updateSuccess = $editData->update($editDataRecord);

        try {
            if ($updateSuccess) {
                return redirect()->route('admin.recentcauses', $id)->with('success', 'Recentcauses has been updated successfully.');
            } else {
                return redirect()->route('admin.recentcauses', $id)->with('error', 'Error updating the recentcauses. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.recentcauses', $id)->with('error', 'Error updating the recentcauses. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $recentcauses = RecentCauses::find($id);
            if (!$recentcauses) {
                return redirect()->route('admin.recentcauses')->with('error', 'Recentcauses not found.');
            }

            // Delete the banner and its associated image
            Storage::delete('public/uploads/' . $recentcauses->image);
            $recentcauses->delete();

            return redirect()->route('admin.recentcauses')->with('success', 'Recentcauses has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.recentcauses')->with('error', 'Error deleting the recentcauses. Please try again.');
        }
    }
}
