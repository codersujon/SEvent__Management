<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use Illuminate\validation\Rule;

class AdminPhotoController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $photo_galleries = PhotoGallery::get();
        return view('admin.photo_gallery.index', compact('photo_galleries'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.photo_gallery.create');
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {

        # VALIDATION
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2024'],
        ]);

        # IMAGES
        $final_name = 'photo_gallery_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $photo_gallery = new PhotoGallery();
        $photo_gallery->caption = $request->caption;
        $photo_gallery->photo =  $final_name;
        $photo_gallery->save();

        return redirect()->route('admin_photo_gallery_index')->with('success', 'Photo created successfully!');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $photo_gallery = PhotoGallery::where('id', $id)->first();
        return view('admin.photo_gallery.edit', compact('photo_gallery'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $photo_gallery = PhotoGallery::where('id', $id)->first();

        # VALIDATION
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2024'],
        ]);

        if($request->photo){
            $request->validate([
                'photo' => ['image', 'mimes: jpg,jpeg,png,gif', 'max:2024'],
            ]);
            $final_name = 'photo_gallery_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            @unlink(public_path('uploads/'.$photo_gallery->photo));
            $photo_gallery->photo = $final_name;
        }

        $photo_gallery->caption = $request->caption;
        $photo_gallery->update();

        return redirect()->route('admin_photo_gallery_index')->with('success', 'Photo updated successfully!');
    }

    /**
     * Destroy
     */
    public function destroy($id)
    {
        $photo_gallery = PhotoGallery::where('id', $id)->first();
        @unlink(public_path('uploads/'.$photo_gallery->photo));
        $photo_gallery->delete();

        return redirect()->route('admin_photo_gallery_index')->with('success', 'Photo deleted successfully!');
    }

}
