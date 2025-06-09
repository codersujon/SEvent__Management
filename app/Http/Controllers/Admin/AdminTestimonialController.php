<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\validation\Rule;

class AdminTestimonialController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {

        # VALIDATION
        $request->validate([
            'name' => ['required'],
            'designation' => ['required'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2024'],
            'comment' => ['required'],
        ]);

        # IMAGES
        $final_name = 'testimonial_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->photo =  $final_name;
        $testimonial->comment  = $request->comment;
        $testimonial->save();

        return redirect()->route('admin_testimonial_index')->with('success', 'Testimonial created successfully!');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::where('id', $id)->first();

        # VALIDATION
        $request->validate([
            'name' => ['required'],
            'designation' => ['required'],
            'comment' => ['required'],
        ]);

        if($request->photo){
            $request->validate([
                'photo' => ['image', 'mimes: jpg,jpeg,png,gif', 'max:2024'],
            ]);
            $final_name = 'testimonial_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            @unlink(public_path('uploads/'.$testimonial->photo));
            $testimonial->photo = $final_name;
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment  = $request->comment;
        $testimonial->update();

        return redirect()->route('admin_testimonial_index')->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Destroy
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        @unlink(public_path('uploads/'.$testimonial->photo));
        $testimonial->delete();

        return redirect()->route('admin_testimonial_index')->with('success', 'Testimonial deleted successfully!');
    }
}
