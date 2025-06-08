<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\validation\Rule;

class AdminAccommodationController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $accommodations = Accommodation::get();
        return view('admin.accommodation.index', compact('accommodations'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.accommodation.create');
    }

    /**
     * Store
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2024'],
        ]);

        # IMAGES
        $final_name = 'accommodation_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $accommodation = new Accommodation();
        $accommodation->name = $request->name;
        $accommodation->description = $request->description;
        $accommodation->photo =  $final_name;
        $accommodation->email  = $request->email;
        $accommodation->phone  = $request->phone;
        $accommodation->address  = $request->address;
        $accommodation->website  = $request->website;
        $accommodation->save();

        return redirect()->route('admin_accommodation_index')->with('success', 'Accommodation created successfully!');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $accommodation = Accommodation::where('id', $id)->first();
        return view('admin.accommodation.edit', compact('accommodation'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $accommodation = Accommodation::where('id', $id)->first();

        # VALIDATION
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if($request->photo){
            $request->validate([
                'photo' => ['image', 'mimes: jpg,jpeg,png,gif', 'max:2024'],
            ]);
            $final_name = 'accommodation_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            @unlink(public_path('uploads/'.$accommodation->photo));
            $accommodation->photo = $final_name;
        }

        $accommodation->name = $request->name;
        $accommodation->description = $request->description;
        $accommodation->email  = $request->email;
        $accommodation->phone  = $request->phone;
        $accommodation->address  = $request->address;
        $accommodation->website  = $request->website;
        $accommodation->update();

        return redirect()->route('admin_accommodation_index')->with('success', 'Accommodation updated successfully!');
    }


    /**
     * Destroy
     */
    public function destroy($id)
    {
        $accommodation = Accommodation::where('id', $id)->first();
        @unlink(public_path('uploads/'.$accommodation->photo));
        $accommodation->delete();

        return redirect()->route('admin_accommodation_index')->with('success', 'Accommodation deleted successfully!');
    }

}
