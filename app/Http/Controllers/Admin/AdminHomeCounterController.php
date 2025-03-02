<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeCounter;

class AdminHomeCounterController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home_counter  = HomeCounter::where('id', 1)->first();
        return view('admin.home_counter.index', compact('home_counter'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        # VALIDATION
        $request->validate([
            'item1_icon' => ['required'],
            'item1_number' => ['required'],
            'item1_title' => ['required'],
            'item2_icon' => ['required'],
            'item2_number' => ['required'],
            'item2_title' => ['required'],
            'item3_icon' => ['required'],
            'item3_number' => ['required'],
            'item3_title' => ['required'],
            'item4_icon' => ['required'],
            'item4_number' => ['required'],
            'item4_title' => ['required'],
        ]);

        $home_counter = HomeCounter::where('id', 1)->first();

        $home_counter->item1_icon = $request->item1_icon;
        $home_counter->item1_number = $request->item1_number;
        $home_counter->item1_title = $request->item1_title;
        $home_counter->item2_icon = $request->item2_icon;
        $home_counter->item2_number = $request->item2_number;
        $home_counter->item2_title = $request->item2_title;
        $home_counter->item3_icon = $request->item3_icon;
        $home_counter->item3_number = $request->item3_number;
        $home_counter->item3_title = $request->item3_title;
        $home_counter->item4_icon = $request->item4_icon;
        $home_counter->item4_number = $request->item4_number;
        $home_counter->item4_title = $request->item4_title;
        $home_counter->status = $request->status;
        $home_counter->update();

        return redirect()->back()->with('success', 'Home Counter is updated!');
    }


}
