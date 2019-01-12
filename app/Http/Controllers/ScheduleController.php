<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Section;
use App\Room;
use App\Subject;
use DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.schedules');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::where('active', 1)->orderBy('grade_level', 'asc')->get();

        return view('admin.schedule-add-edit', ['schedule' => null, 'sections' => $sections]);
    }


    public function create2(Request $request)
    {
        $section_id = $request['section'];

        $id = $this->core->decryptString($section_id);

        $section = Section::findorfail($id);
        $rooms = Room::where('active', 1)->orderBy('name', 'asc')->get();
        $time = $this->core->time_range();
        $days = $this->core->days();

        $setting = DB::table('settings')->first();

        if($section->grade_level < 11) {
            $semester = null;
        }
        else {
            $semester = $setting->semester;
        }

        $subjects = Subject::where('grade_level', $section->grade_level)->where('strand_id', $section->strand_id)->where('semester', $semester)->get();

        return view('admin.schedule-add-edit2', ['section' => $section, 'rooms' => $rooms, 'subjects' => $subjects, 'time' => $time, 'days' => $days]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'room' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'subject' => 'required'
        ]);

        $section_id = $this->core->decryptString($request['section_id']);
        $room = $request['room'];
        $day = $request['day'];
        $start_time = $request['start_time'];
        $end_time = $request['end_time'];
        $subject = $request['subject'];

        $school_year = date('Y') . '-' . date('Y', strtotime("+1 year"));

        // check start time and end time
        if($start_time >= $end_time) {
            return redirect()->back()->with('error', 'Invalid Start or End Time');
        }

        // check conflict time of the section
        $section_day_time_conflict = Schedule::where('school_year', $school_year)
            ->where('active', 1)
            ->where('section_id', $section_id)
            ->where('day', $day)
            ->where('start_time', $start_time)
            ->first();

        if(!empty($section_day_time_conflict)) {
            return redirect()->back()->with('error', 'Section Time Conflict');
        }

        // check subject duplicate
        $subject_duplicate = Schedule::where('school_year', $school_year)
            ->where('active', 1)
            ->where('section_id', $section_id)
            ->where('subject_id', $subject)
            ->first();

        if(!empty($subject_duplicate)) {
            return redirect()->back()->with('error', 'Duplicate Subject');
        }

        // check conflict time and day of the room
        $conflict_room_time_date = Schedule::where('school_year', $school_year)
            ->where('active', 1)
            ->where('room_id', $room)
            ->where('day', $day)
            ->where('start_time', $start_time)
            ->where('end_time', $end_time)
            ->first();

        if(!empty($conflict_room_time_date)) {
            return redirect()->back()->with('error', 'Room Time Conflict on the Day');
        }

        // conflict on time range of the room time in the day
        $range_room_time_date_conflict = Schedule::where('school_year', $school_year)
            ->where('active', 1)
            ->where('room_id', $room)
            ->where('day', $day)
            ->where(function ($query) use ($start_time) {
                $query->where('start_time', '<=', $start_time);
            })
            ->where(function ($query2) use ($end_time) {
                $query2->where('end_time', '<=', $end_time);
            })
            ->first();

        if(!empty($range_room_time_date_conflict)) {
            return redirect()->back()->with('error', 'Room Time Conflict on the Day!');
        }

        $room_date_time_range_conflict = Schedule::where('school_year', $school_year)
            ->where('active', 1)
            ->where('room_id', $room)
            ->where('day', $day)
            ->where('end_time', '<', $start_time)
            ->where('end_time', '>', $end_time )
            ->first();

        if(!empty($room_date_time_range_conflict)) {
            return redirect()->back()->with('error', 'Room Time Conflict on the Day3!');
        }


        $schedule = new Schedule();
        $schedule->school_year = $school_year;
        $schedule->section_id = $section_id;
        $schedule->room_id = $room;
        $schedule->day = $day;
        $schedule->start_time = $start_time;
        $schedule->end_time = $end_time;
        $schedule->subject_id = $subject;
        
        if($schedule->save()) {
            AuditTrailController::create('Created Schedule');
            return redirect()->back()->with('success', 'Added Schedule!');
        }

        return redirect()->back()->with('error', 'Error in Adding Schedule!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $id = $this->core->decryptString($id);

        $schedule = Schedule::findorfail($id);
        $schedule->active = 0;

        if($schedule->save()) {
            AuditTrailController::create('Removed Schedule');
        }
    }


    /**
     * @return all active schedules
     */
    public function allSchedules()
    {

        $school_year = date('Y') . '-' . date('Y', strtotime('+1 year'));
        $schedules = Schedule::where('active', 1)->where('school_year', $school_year)->get();

        $data = [
            'section' => null,
            'day' => null,
            'room' => null,
            'time' => null,
            'subject' => null,
            'action' => null
        ];

        if(count($schedules) > 0) {
            
            $data = null;

            foreach($schedules as $s) {
                $data[] = [
                    'section' => $this->core->getGradeSection($s->section_id),
                    'day' => $this->core->getDay($s->day),
                    'room' => $this->core->getRoomName($s->room_id),
                    'time' => $this->core->getTime($s->start_time) . ' - ' . $this->core->getTime($s->end_time),
                    'subject' => $this->core->getSubject($s->subject_id),
                    'action' => "<button class='btn btn-danger btn-xs' onclick=\"removeSched('" . encrypt($s->id) . "')\"><i class='fa fa-trash'></i> Remove</button>"
                ];
            }
        }

        return $data;
    }
}
