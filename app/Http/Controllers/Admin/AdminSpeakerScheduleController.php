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

        $pivot_table_data = DB::table('schedule_speakers')
                                ->join('speakers', 'schedule_speakers.speaker_id', '=', 'speakers.id')
                                ->join('schedules', 'schedule_speakers.schedule_id', '=', 'schedules.id')
                                ->select(
                                    'schedule_speakers.*',
                                    'speakers.name as speaker_name',
                                    'speakers.email as speaker_email',
                                    'schedules.title as schedule_title',
                                    'schedules.schedule_day_id as schedule_id',
                                    )
                                ->get();

        return view('admin.speaker_schedule.index', compact('speakers', 'schedules', 'pivot_table_data'));
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

    /**
     * Destroy
     */
    public function destroy($id)
    {
        DB::table('schedule_speakers')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Speaker removed from schedule successfully!');
    }
}
