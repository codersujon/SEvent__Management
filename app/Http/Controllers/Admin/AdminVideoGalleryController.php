<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoGallery;
use Illuminate\validation\Rule;


class AdminVideoGalleryController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $video_galleries = VideoGallery::get();
        return view('admin.video_gallery.index', compact('video_galleries'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.video_gallery.create');
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {

        # VALIDATION
        $request->validate([
            'video' => ['required'],
        ]);

        $video_gallery = new VideoGallery();
        $video_gallery->caption = $request->caption;
        $video_gallery->video =  $request->video;
        $video_gallery->save();

        return redirect()->route('admin_video_gallery_index')->with('success', 'Video created successfully!');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $video_gallery = VideoGallery::where('id', $id)->first();
        return view('admin.video_gallery.edit', compact('video_gallery'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $video_gallery = VideoGallery::where('id', $id)->first();

        # VALIDATION
        $request->validate([
            'video' => ['required'],
        ]);

        $video_gallery->caption = $request->caption;
        $video_gallery->video =  $request->video;
        $video_gallery->update();

        return redirect()->route('admin_video_gallery_index')->with('success', 'Video updated successfully!');
    }

    /**
     * Destroy
     */
    public function destroy($id)
    {
        $video_gallery = VideoGallery::where('id', $id)->first();
        $video_gallery->delete();

        return redirect()->route('admin_video_gallery_index')->with('success', 'Video deleted successfully!');
    }
}
