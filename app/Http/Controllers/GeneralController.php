<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    // get time and day in schedule
    // school_year, section_id, subject
    public static function get_time_and_day($school_year, $section_id, $subject_id)
    {
        $sched = \App\Schedule::where('school_year', $school_year)
                        ->where('section_id', $section_id)
                        ->where('subject_id', $subject_id)
                        ->first();

        if(empty($sched)) {
            return 'N/A';
        }

        // get time equiv
        $start_time = self::getTime($sched->start_time);
        $end_time = self::getTime($sched->end_time);
        $days = str_replace(array('[',']','"',','), '',$sched->days);

        return $days . ' ' . $start_time . '-' . $end_time;
    }

    // get room name to show in schedule
    public static function get_room_name($school_year, $section_id, $subject_id)
    {
        $sched = \App\Schedule::where('school_year', $school_year)
                        ->where('section_id', $section_id)
                        ->where('subject_id', $subject_id)
                        ->first();

        if(empty($sched)) {
            return 'N/A';
        }

        // get room name
        $room = self::getRoomName($sched->room_id);

        return $room;
    }



    // get faculty assigned
    public static function faculty_assigned($school_year, $section_id, $subject_id)
    {
        $fa = \App\FacultyAssignment::where('academic_year', $school_year)
                        ->where('section_id', $section_id)
                        ->where('subject_id', $subject_id)
                        ->first();

        if(empty($fa)) {
            return "N/A";
        }

        return $fa->faculty->firstname . ' ' . $fa->faculty->lastname;
    }


    // get room name
    public static function getRoomName($id)
    {
        $room = \App\Room::find($id);

        return $room->name;
    }

    public static function getTime($id)
    {
        $times = self::time_range();

        foreach($times as $t) {
            if($t['id'] == $id) {
                return $t['time'];
            }
        }

        return 'N/A';
    }

    public static function time_range()
    {
        $time = [
            [
                'id' => '1',
                'time' => '7:00am'
            ],
            [
                'id' => '2',
                'time' => '7:30am'
            ],
            [
                'id' => '3',
                'time' => '8:00am'
            ],
            [
                'id' => '4',
                'time' => '8:30am'
            ],
            [
                'id' => '5',
                'time' => '9:00am'
            ],
            [
                'id' => '6',
                'time' => '9:30am'
            ],
            [
                'id' => '7',
                'time' => '10:00am'
            ],
            [
                'id' => '8',
                'time' => '10:30am'
            ],
            [
                'id' => '9',
                'time' => '11:00am'
            ],
            [
                'id' => '10',
                'time' => '11:30am'
            ],
            [
                'id' => '11',
                'time' => '12:00pm'
            ],
            [
                'id' => '12',
                'time' => '12:30pm'
            ],
            [
                'id' => '13',
                'time' => '1:00pm'
            ],
            [
                'id' => '14',
                'time' => '1:30pm'
            ],
            [
                'id' => '15',
                'time' => '2:00pm'
            ],
            [
                'id' => '16',
                'time' => '2:30pm'
            ],
            [
                'id' => '17',
                'time' => '3:00pm'
            ],
            [
                'id' => '18',
                'time' => '3:30pm'
            ],
            [
                'id' => '19',
                'time' => '4:00pm'
            ],
            [
                'id' => '20',
                'time' => '4:30pm'
            ],
            [
                'id' => '21',
                'time' => '5:00pm'
            ],
            [
                'id' => '22',
                'time' => '5:30pm'
            ],
            [
                'id' => '23',
                'time' => '6:00pm'
            ],
        ];

        return $time;
    }

}
