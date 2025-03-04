<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;

class AdminSpeakerController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $speakers = Speaker::get();
        return view('admin.speaker.index', compact('speakers'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.speaker.create');
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {

        # VALIDATION
        $request->validate([
            'name' => ['required'],
            'slug' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z-]+$/', 'unique:speakers'],
            'designation' => ['required'],
            'email' => ['required', 'email', 'unique:speakers'],
            'phone' => ['required'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2024'],
            'phone' => ['required', 'unique:speakers'],
        ]);

        # IMAGES
        $final_name = 'speaker_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $speaker = new Speaker();
        $speaker->name = $request->name;
        $speaker->slug = $request->slug;
        $speaker->designation = $request->designation;
        $speaker->photo =  $final_name;
        $speaker->email  = $request->email;
        $speaker->phone  = $request->phone;
        $speaker->biography  = $request->biography;
        $speaker->address  = $request->address;
        $speaker->website  = $request->website;
        $speaker->facebook  = $request->facebook;
        $speaker->twitter  = $request->twitter;
        $speaker->linkedin  = $request->linkedin;
        $speaker->instagram  = $request->instagram;
        $speaker->save();

        return redirect()->route('admin_speaker_index')->with('success', 'Speaker created successfully!');
    }


    /**
     * Edit
     */
    public function edit()
    {
        //
    }

    /**
     * Update
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Destroy
     */
    public function destroy()
    {
        //
    }
}
