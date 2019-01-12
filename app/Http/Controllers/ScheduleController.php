<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Section;
use App\Room;
use App\Subject;
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

        if($section->grade_level < 11) {
            $semester = null;
        }
        else {
            $semester = 1;
        }

        $subjects = Subject::where('grade_level', $section->grade_level)->where('strand_id', $section->strand_id)->where('semester', $semester)->get();

        return view('admin.schedule-add-edit2', ['section' => $section, 'rooms' => $rooms, 'subjects' => $subjects]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Schedule $schedule)
    {
        //
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
            'room ' => null,
            'day' => null,
            'time' => null,
            'section' => null,
            'action' => null
        ];

        return $data;
    }
}
