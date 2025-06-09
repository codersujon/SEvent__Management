<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\validation\Rule;

class AdminPostController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $posts = Post::get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {

        # VALIDATION
        $request->validate([
            'title' => ['required'],
            'slug' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z-]+$/', Rule::unique('posts')],
            'short_description' => ['required'],
            'description' => ['required'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2024'],
        ]);

        # IMAGES
        $final_name = 'post_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->photo =  $final_name;
        $post->save();

        return redirect()->route('admin_post_index')->with('success', 'Post created successfully!');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        # VALIDATION
        $request->validate([
            'title' => ['required'],
            'slug' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z-]+$/', Rule::unique('posts')],
            'short_description' => ['required'],
            'description' => ['required'],
        ]);

        if($request->photo){
            $request->validate([
                'photo' => ['image', 'mimes: jpg,jpeg,png,gif', 'max:2024'],
            ]);
            $final_name = 'post_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            @unlink(public_path('uploads/'.$post->photo));
            $post->photo = $final_name;
        }

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->update();

        return redirect()->route('admin_post_index')->with('success', 'Post updated successfully!');
    }

    /**
     * Destroy
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();
        @unlink(public_path('uploads/'.$post->photo));
        $post->delete();

        return redirect()->route('admin_post_index')->with('success', 'Post deleted successfully!');
    }
}
