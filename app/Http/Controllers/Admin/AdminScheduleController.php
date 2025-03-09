<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleDay;

class AdminScheduleController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $schedules = Schedule::with('schedule_day')->orderBy('item_order', 'ASC')->get();
        return view('admin.schedule.index', compact('schedules'));
    }

    /**
     * Create
     */
    public function create()
    {
        $schedule_days = ScheduleDay::orderBy('order1', 'ASC')->get();
        return view('admin.schedule.create', compact('schedule_days'));
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {
        # VALIDATION
        $request->validate([
            'name' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'location' => ['required'],
            'time' => ['required'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2024'],
        ]);

        # IMAGES
        $final_name = 'schedule_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $schedule = new Schedule();
        $schedule->schedule_day_id = $request->schedule_day_id;
        $schedule->name = $request->name;
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->location  = $request->location;
        $schedule->time  = $request->time;
        $schedule->photo =  $final_name;
        $schedule->item_order =  $request->item_order;
        $schedule->save();

        return redirect()->route('admin_schedule_index')->with('success', 'Schedule created successfully!');
    }
}
