<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyAssignmentController extends Controller
{
	// assignment of subjects on faculty
    public function index()
    {
    	return view('admin.faculty-subject-assignments');
    }


    // add subject on faculty
    public function create()
    {
    	$faculties = \App\User::where('user_type', 2)->where('active', 1)->get();
    	$sections = \App\Section::where('active', 1)->get();

    	return view('admin.faculty-subject-assignments-add-edit', ['assignment' => null, 'faculties' => $faculties, 'sections' => $sections]);
    }


    // store faculty assignment
    public function store(Request $request)
    {
        $request->validate([
            'faculty' => 'required',
            'section' => 'required',
            'subject' => 'required',
        ]);

        $faculty_id = $request['faculty'];
        $section_id = $request['section'];
        $sebject_id = $request['subject'];

        $assignment = $request['assignment'];

        $ay = date('Y') . '-' . date('Y', strtotime("-1 year"));

        if($assignment == null) {
            // create
            $fa = new \App\FacultyAssignment();


        }
        else {
            // update
            $fa = new \App\FacultyAssignment::find($assignment);
        }

    }
}
