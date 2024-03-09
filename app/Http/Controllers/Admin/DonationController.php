<?php

namespace App\Http\Controllers\Admin;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['donation'] = Donation::get();
        return view('admin.donation.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.donation.create');
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
            'picturesubtitle' => 'required', // Validate if necessary
            'picturesubtitle2' => 'required', // Validate if necessary
            'picturedescription' => 'required',
            'picturebutton' => 'required', // Assuming this is a field in your form
            'button' => 'required',
        ]);

        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/uploads', $fileName);

        $saveData = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'picturetitle' => $request->picturetitle,
            'picturesubtitle' => $request->picturesubtitle,
            'picturesubtitle2' => $request->picturesubtitle2,
            'picturedescription' => $request->picturedescription,
            'picturebutton' => $request->picturebutton,
            'button' => $request->button,
            'image' => $fileName,
        ];

        Donation::create($saveData);

        try {
            // Your save logic here
            return redirect()->route('admin.donation')->with('success', 'Donation have been created successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.donation')->with('error', 'Error creating the donation. Please try again.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donation = Donation::find($id);
        return view('admin.donation.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $donation = Donation::find($id);
        return view('admin.donation.edit', compact('donation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fileName = '';
        $editData = Donation::find($id);
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
            'picturesubtitle' => $request->picturesubtitle,
            'picturesubtitle2' => $request->picturesubtitle2,
            'picturedescription' => $request->picturedescription,
            'picturebutton' => $request->picturebutton,
            'button' => $request->button,
            'image' => $fileName,
        ];

        $updateSuccess = $editData->update($editDataRecord);

        try {
            if ($updateSuccess) {
                return redirect()->route('admin.donation', $id)->with('success', 'Donation has been updated successfully.');
            } else {
                return redirect()->route('admin.donation', $id)->with('error', 'Error updating the donation. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.donation', $id)->with('error', 'Error updating the donation. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $donation = Donation::find($id);
            if (!$donation) {
                return redirect()->route('admin.donation')->with('error', 'Donation not found.');
            }

            // Delete the banner and its associated image
            Storage::delete('public/uploads/' . $donation->image);
            $donation->delete();

            return redirect()->route('admin.donation')->with('success', 'Donation has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.donation')->with('error', 'Error deleting the donation. Please try again.');
        }
    }
}
