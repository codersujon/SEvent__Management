<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organiser;
use Illuminate\validation\Rule;

class AdminOrganizerController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $organisers = Organiser::get();
        return view('admin.organiser.index', compact('organisers'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.organiser.create');
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {

        # VALIDATION
        $request->validate([
            'name' => ['required'],
            'slug' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z-]+$/', 'unique:organisers'],
            'designation' => ['required'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2024'],
        ]);

        # IMAGES
        $final_name = 'organiser_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $organiser = new Organiser();
        $organiser->name = $request->name;
        $organiser->slug = $request->slug;
        $organiser->designation = $request->designation;
        $organiser->photo =  $final_name;
        $organiser->email  = $request->email;
        $organiser->phone  = $request->phone;
        $organiser->biography  = $request->biography;
        $organiser->address  = $request->address;
        $organiser->facebook  = $request->facebook;
        $organiser->twitter  = $request->twitter;
        $organiser->linkedin  = $request->linkedin;
        $organiser->instagram  = $request->instagram;
        $organiser->save();

        return redirect()->route('admin_organizer_index')->with('success', 'Organiser created successfully!');
    }
}
