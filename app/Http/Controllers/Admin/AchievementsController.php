<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievements;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['achievements'] = Achievements::get();
        return view('admin.achievements.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.achievements.create');
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
                'image' => 'required',

            ]);

            $saveData = [
                'title' => $request->title,
                'description' => $request->description,
                'boxtitle' => $request->boxtitle,
                'boxsubtitle' => $request->boxsubtitle,
                'button' => $request->button,
                'icon' => $request->icon,
            ];
            Achievements::create($saveData);

            try {
                // Your save logic here

                return redirect()->route('admin.achievements')->with('success', 'Achievements has been created successfully.');


            } catch (\Exception $e) {
                // Handle any exceptions or errors
                return redirect()->route('admin.achievements')->with('error', 'Error creating the achievements. Please try again.');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $achievements = Achievements::find($id);
        return view('admin.achievements.show', compact('achievements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $achievements = Achievements::find($id);
        return view('admin.achievements.edit', compact('achievements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fileName = '';
        $editData = Achievements::find($id);

        $editDataRecord = [
            'title' => $request->title,
            'description' => $request->description,
            'boxtitle' => $request->boxtitle,
            'boxsubtile' => $request->boxsubtile,
            'button' => $request->button,
            'icon' => $request->icon,
        ];

        $updateSuccess = $editData->update($editDataRecord);

        try {
            if ($updateSuccess) {
                return redirect()->route('admin.achievements', $id)->with('success', 'Achievements has been updated successfully.');
            } else {
                return redirect()->route('admin.achievements', $id)->with('error', 'Error updating the banner. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.achievements', $id)->with('error', 'Error updating the achievements. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $achievements = Achievements::find($id);
            if (!$achievements) {
                return redirect()->route('admin.achievements')->with('error', 'About-Us not found.');
            }


            $achievements->delete();

            return redirect()->route('admin.achievements')->with('success', 'Achievements has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.achievements')->with('error', 'Error deleting the achievements. Please try again.');
        }
    }
}
