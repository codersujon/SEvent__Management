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
        $organizers = Organiser::get();
        return view('admin.organizer.index', compact('organizers'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.organizer.create');
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
        $final_name = 'organizer_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $organizer = new Organiser();
        $organizer->name = $request->name;
        $organizer->slug = $request->slug;
        $organizer->designation = $request->designation;
        $organizer->photo =  $final_name;
        $organizer->email  = $request->email;
        $organizer->phone  = $request->phone;
        $organizer->biography  = $request->biography;
        $organizer->address  = $request->address;
        $organizer->facebook  = $request->facebook;
        $organizer->twitter  = $request->twitter;
        $organizer->linkedin  = $request->linkedin;
        $organizer->instagram  = $request->instagram;
        $organizer->save();

        return redirect()->route('admin_organizer_index')->with('success', 'Organizer created successfully!');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $organizer = Organiser::where('id', $id)->first();
        return view('admin.organizer.edit', compact('organizer'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $organizer = Organiser::where('id', $id)->first();

        # VALIDATION
        $request->validate([
            'name' => ['required'],
            'slug' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z-]+$/', Rule::unique('organisers')->ignore($id)],
            'designation' => ['required'],
        ]);

        if($request->photo){
            $request->validate([
                'photo' => ['image', 'mimes: jpg,jpeg,png,gif', 'max:2024'],
            ]);
            $final_name = 'organizer_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            @unlink(public_path('uploads/'.$organizer->photo));
            $organizer->photo = $final_name;
        }

        $organizer->name = $request->name;
        $organizer->slug = $request->slug;
        $organizer->designation = $request->designation;
        $organizer->email  = $request->email;
        $organizer->phone  = $request->phone;
        $organizer->biography  = $request->biography;
        $organizer->address  = $request->address;
        $organizer->facebook  = $request->facebook;
        $organizer->twitter  = $request->twitter;
        $organizer->linkedin  = $request->linkedin;
        $organizer->instagram  = $request->instagram;
        $organizer->update();

        return redirect()->route('admin_organizer_index')->with('success', 'Organizer updated successfully!');
    }

    /**
     * Destroy
     */
    public function destroy($id)
    {
        $organizer = Organiser::where('id', $id)->first();
        @unlink(public_path('uploads/'.$organizer->photo));
        $organizer->delete();

        return redirect()->route('admin_organizer_index')->with('success', 'Organizer deleted successfully!');
    }
}
