<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controller\AuditTrailController;

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
        $subject_id = $request['subject'];

        $assignment = $request['assignment'];

        $academic_year = \App\SchoolYear::whereActive(1)->first();

        if(empty($academic_year)) {
            return redirect()->route('admin.faculty.assignments.add')->with('error', 'Activate School Year!');
        }

        $ay = $academic_year->from . '-' . $academic_year->to;



        // faculty assignment if dedicated to others
        $check = \App\FacultyAssignment::whereActive(1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $subject_id)
                            ->where('academic_year', $ay)
                            ->first();

        if(!empty($check)) {
            return redirect()->back()->with('error', 'Error! Subject Alredy Assigned');
        }

        if($assignment == null) {
            // create
            $fa = new \App\FacultyAssignment();

            // check subject if already assigned to faculty
            if($this->core->checkSubjectAssignment($subject_id, $faculty_id, $section_id)) {
                return redirect()->route('admin.faculty.assignments.add')->with('error', 'Subject for the Section Already assigned to another Faculty');
            }

            $message = 'Subject Assigned to Faculty';

        }
        else {
            // update
            $fa = \App\FacultyAssignment::find($assignment);

            // check subject if already assigned to faculty

            $message = 'Updated Subject Assignment to Faculty';

        }

        $fa->faculty_id = $faculty_id;
        $fa->section_id = $section_id;
        $fa->subject_id = $subject_id;
        $fa->academic_year = $academic_year->from . '-' . $academic_year->to;

        if($fa->save()) {
            return redirect()->route('admin.faculty.assignments.add')->with('success', $message);
        }

    }



    // ALL FACULTY ASSIGNEMNT
    public function allAssignment()
    {
        $assignments = \App\FacultyAssignment::where('active', 1)->get();

        $data = [
            'faculty' => null,
            'grade_section' => null,
            'subject' => null,
            'action' => null,
        ];

        if(count($assignments) > 0) {
            $data = null;
            foreach($assignments as $a) {
                $data[] = [
                    'faculty' => $this->core->get_fullname_by_id($a->faculty_id),
                    'grade_section' => $this->core->getGradeSection($a->section_id),
                    'subject' => $this->core->getSubjectCode($a->subject_id),
                    'action' => '<button class="btn btn-danger btn-xs" onclick="remove_assignment(' . $a->id . ')"><i class="fa fa-trash"></i> Remove</button>'
                ];
            }
        }

        return $data;
    }


    // remove faculty assignment
    public function remove($id)
    {
        $assignment = \App\FacultyAssignment::find($id);

        $assignment->active = 0;

        if($assignment->save()) {
            AuditTrailController::create('Removed Faculty Assignment');
        }
    }
}
