<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\SponsorCategory;

class AdminSponsorController extends Controller
{
    /**
     * Index
     */
    public function index(){
        $sponsors = Sponsor::with('sponsor_category')->get();
        return view('admin.sponsor.index', compact('sponsors'));
    }

    /**
     * Create
     */
    public function create(){
        $sponsor_categories =  SponsorCategory::orderBy('id', 'ASC')->get();
        return view('admin.sponsor.create', compact('sponsor_categories'));
    }

    /**
     * Store
     */
    public function store(Request $request){

        # VALIDATION
        $request->validate([
            'name' => ['required'],
            'slug' => ['required', 'alpha_dash', 'unique:sponsors,slug'],
            'tagline' => ['required'],
            'description' => ['required'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,gif,jpg', 'max:2048'],
            'featured_photo' => ['required', 'image', 'mimes:jpeg,png,gif,jpg', 'max:2048'],
        ]);

        # LOGO IMAGES
        $final_name_logo = 'sponsor_logo'.time().'.'.$request->logo->extension();
        $request->logo->move(public_path('uploads'), $final_name_logo);

        # FEATURED PHOTO
        $final_name_featured_photo = 'sponsor_featured_photo'.time().'.'.$request->featured_photo->extension();
        $request->featured_photo->move(public_path('uploads'), $final_name_featured_photo);

        $sponsor = new Sponsor();
        $sponsor->sponsor_category_id = $request->sponsor_category_id;
        $sponsor->name = $request->name;
        $sponsor->slug = $request->slug;
        $sponsor->tagline = $request->tagline;
        $sponsor->description = $request->description;
        $sponsor->logo =  $final_name_logo;
        $sponsor->featured_photo =  $final_name_featured_photo;
        $sponsor->address  = $request->address;
        $sponsor->email  = $request->email;
        $sponsor->phone  = $request->phone;
        $sponsor->website  = $request->website;
        $sponsor->facebook  = $request->facebook;
        $sponsor->twitter  = $request->twitter;
        $sponsor->linkedin  = $request->linkedin;
        $sponsor->instagram  = $request->instagram;
        $sponsor->map  = $request->map;
        $sponsor->save();

        return redirect()->route('admin_sponsor_index')->with('success', 'Sponsor created successfully!');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $sponsor = Sponsor::where('id', $id)->first();
        $sponsor_categories =  SponsorCategory::orderBy('id', 'ASC')->get();
        return view('admin.sponsor.edit', compact('sponsor', 'sponsor_categories'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $sponsor = Sponsor::where('id', $id)->first();

        # VALIDATION
        $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'tagline' => ['required'],
            'description' => ['required'],
        ]);

        if($request->logo){
            $request->validate([
                'logo' => ['image', 'mimes:jpeg,png,gif,jpg', 'max:2048'],
            ]);
            $final_name_logo = 'sponsor_logo'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('uploads'), $final_name_logo);
            @unlink(public_path('uploads/'.$sponsor->logo));
            $sponsor->logo = $final_name_logo;
        }

        if($request->featured_photo){
            $request->validate([
                'featured_photo' => ['image', 'mimes:jpeg,png,gif,jpg', 'max:2048'],
            ]);
            $final_name_featured_photo = 'sponsor_featured_photo'.time().'.'.$request->featured_photo->extension();
            $request->featured_photo->move(public_path('uploads'), $final_name_featured_photo);
            @unlink(public_path('uploads/'.$sponsor->featured_photo));
            $sponsor->featured_photo = $final_name_featured_photo;
        }

        $sponsor->sponsor_category_id = $request->sponsor_category_id;
        $sponsor->name = $request->name;
        $sponsor->slug = $request->slug;
        $sponsor->tagline = $request->tagline;
        $sponsor->description = $request->description;
        $sponsor->address  = $request->address;
        $sponsor->email  = $request->email;
        $sponsor->phone  = $request->phone;
        $sponsor->website  = $request->website;
        $sponsor->facebook  = $request->facebook;
        $sponsor->twitter  = $request->twitter;
        $sponsor->linkedin  = $request->linkedin;
        $sponsor->instagram  = $request->instagram;
        $sponsor->map  = $request->map;
        $sponsor->update();

        return redirect()->route('admin_sponsor_index')->with('success', 'Sponsor updated successfully!');
    }

    /**
     * Destroy
     */
    public function destroy($id)
    {
        $sponsor = Sponsor::where('id', $id)->first();
        @unlink(public_path('uploads/'.$sponsor->logo));
        @unlink(public_path('uploads/'.$sponsor->featured_photo));
        $sponsor->delete();

        return redirect()->route('admin_sponsor_index')->with('success', 'Sponsor deleted successfully!');
    }

}
