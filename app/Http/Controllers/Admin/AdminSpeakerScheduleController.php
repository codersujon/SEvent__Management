<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Models\Schedule;
use DB;

class AdminSpeakerScheduleController extends Controller
{
   /**
    * Index
    */
    public function index()
    {
        $speakers = Speaker::orderBy('name', 'ASC')->get();
        $schedules = Schedule::with('schedule_day')->orderBy('id', 'ASC')->get();
        return view('admin.speaker_schedule.index', compact('speakers', 'schedules'));
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {
        $check = DB::table('schedule_speakers')
                    ->where('schedule_id', $request->schedule_id)
                    ->first();

        if($check){
            return redirect()->back()->with('error', 'Speaker already added to this schedule!');
        }

        $speaker = Speaker::find($request->speaker_id);
        $schedule = Schedule::find($request->schedule_id);
        $speaker->schedules()->attach($request->schedule_id);

        // $schedule = Schedule::find($request->schedule_id);
        // $schedule->speakers()->attach($request->speaker_id);

        return redirect()->back()->with('success', 'Speaker added to schedule successfully!');
    }
}
