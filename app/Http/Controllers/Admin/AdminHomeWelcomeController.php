<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeWelcome;

class AdminHomeWelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home_welcome  = HomeWelcome::where('id', 1)->first();
        return view('admin.home_welcome.index', compact('home_welcome'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        # VALIDATION
        $request->validate([
            'heading' => ['required'],
            'description' => ['required'],
        ]);

        $home_welcome = HomeWelcome::where('id', 1)->first();

        if($request->photo){
            $request->validate([
                'photo' => ['image', 'mimes: jpg,jpeg,png,gif', 'max:10240'],
            ]);
            $final_name = 'home_welcome_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            @unlink(public_path('uploads/'.$home_welcome->photo));
            $home_welcome->photo = $final_name;
        }

        $home_welcome->heading = $request->heading;
        $home_welcome->description = $request->description;
        $home_welcome->button_text = $request->button_text;
        $home_welcome->button_url = $request->button_url;
        $home_welcome->status = $request->status;
        $home_welcome->update();
        return redirect()->back()->with('success', 'Home Welcome is updated!');
    }

}
