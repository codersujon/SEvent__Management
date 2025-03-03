<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;

class AdminSpeakerController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $speakers = Speaker::get();
        return view('admin.speaker.index', compact('speakers'));
    }

    /**
     * Create
     */
    public function create()
    {
        //
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Edit
     */
    public function edit()
    {
        //
    }

    /**
     * Update
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Destroy
     */
    public function destroy()
    {
        //
    }
}
