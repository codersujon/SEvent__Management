<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleDay;

class AdminScheduleDayController extends Controller
{
     /**
     * Index
     */
    public function index()
    {
        $schedule_days = ScheduleDay::orderBy('order1', 'ASC')->get();
        return view('admin.schedule_day.index', compact('schedule_days'));
    }

     /**
     * Create
     */
    public function create()
    {
        return view('admin.schedule_day.create');
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {

        # VALIDATION
        $request->validate([
            'day' => ['required'],
            'date1' => ['required'],
            'order1' => ['required']
        ], [],[
            'day' => 'Day',
            'date1' => 'Date',
            'order1' => 'Order'
        ]);

        $schedule_day = new ScheduleDay();
        $schedule_day->day = $request->day;
        $schedule_day->date1 = $request->date1;
        $schedule_day->order1 = $request->order1;
        $schedule_day->save();

        return redirect()->route('admin_schedule_day_index')->with('success', 'Schedule Day created successfully!');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $schedule_day = ScheduleDay::where('id', $id)->first();
        return view('admin.schedule_day.edit', compact('schedule_day'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
       $schedule_day = ScheduleDay::where('id', $id)->first();

       # VALIDATION
       $request->validate([
        'day' => ['required'],
        'date1' => ['required'],
        'order1' => ['required']
        ], [],[
            'day' => 'Day',
            'date1' => 'Date',
            'order1' => 'Order'
        ]);

        $schedule_day->day = $request->day;
        $schedule_day->date1 = $request->date1;
        $schedule_day->order1 = $request->order1;
        $schedule_day->update();

        return redirect()->route('admin_schedule_day_index')->with('success', 'Schedule Day updated successfully!');
    }

     /**
     * Destroy
     */
    public function destroy($id)
    {
        $check = Schedule::where('schedule_day_id', $id)->first();
        if($check){
            return redirect()->route('admin_schedule_day_index')->with('error', 'You can not delete this schedule day, because it has some schedules!');
        }

        $schedule_day = ScheduleDay::where('id', $id)->first();
        $schedule_day->delete();

        return redirect()->route('admin_schedule_day_index')->with('success', 'Schedule Day deleted successfully!');
    }

}
