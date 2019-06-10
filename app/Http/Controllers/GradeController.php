<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentSection;
use App\Subject;
use App\Section;
use App\Grade;

use DB;
use Auth;
use App\Http\Controllers\AuditTrailController;

class GradeController extends Controller
{
    // VIEW STUDENT GRADES
    public function viewGrades()
    {
        $student = Auth::user();

        $grades = Grade::where('user_id', $student->id)->count();

    	return view('student.grades', ['grades' => $grades]);
    }


    // student grade forat for datatables
    public function studentGrades()
    {
        $student = Auth::user();

        $grades = Grade::where('user_id', $student->id)->get();

        $g = [
            'grade_level' => NULL,
            'subject' => NULL,
            'grade' => NULL,
        ];

        if(count($grades) > 0) {
            $g = NULL;

            foreach($grades as $gr) {
                $g[] = [
                    'grade_level' => 'Grade ' . $gr->subject->grade_level,
                    'subject' => $gr->subject->code,
                    'grade' => $gr->grade
                ];
            }
        }

        return $g;
    }


    // METHOD USE TO SAVE GRADES OF STUDENTS
    public function saveGrade(Request $request)
    {
    	$subject_id = $request['subject_id'];
    	$section_id = $request['section_id'];

    	$subject = Subject::findorfail($subject_id);
    	$section = Section::findorfail($section_id);

    	$students = StudentSection::where('active', 1)->where('section_id', $section_id)->get();

        $sy = \App\SchoolYear::whereActive(1)->first();

        if(!empty($sy)) {
            $year = $sy->from . '-' . $sy->to;
        }
        else {
            $year = date('Y') . '-' . date('Y', strtotime("+1 year"));
        }

    	$grades = [];

    	if(count($students) > 0) {
    		foreach($students as $s) {

    			// check if there is existing grade of 
    			$exist_student_grade = Grade::where('user_id', $s->student->id)->where('subject_id', $subject->id)->first();

    			if(!empty($exist_student_grade)) {
    				return redirect()->back()->with('error', 'Some students has grades, please see grades for reference.');
    			}

    			$grades[] = [
    				'user_id' => $s->student->id,
    				'subject_id' => $subject->id,
    				'grade' => $request['grade_'.$s->student->id],
                    'grade_level' => $section->grade_level,
                    'school_year' => $year
    			];

    		}

    		// save using query builder
    		if(DB::table('grades')->insert($grades)) {

                $action = "Encode Remarks";
                AuditTrailController::create($action);
    			return redirect()->back()->with('success', 'Student Remark Saved!');
    		}
    	}

    	return redirect()->back()->with('error', 'No Students in the Subject Section');

    }


    // method use to  update subject grade
    public function updateGrade(Request $request)
    {
        $request->validate([
            'grade' => 'required'
        ]);

        $grade_id = $request['grade_id'];
        $grade = $request['grade'];

        if($grade_id != NULL) {
            $g = Grade::findorfail($grade_id);
            $g->grade = $grade;
            $g->save();

            $action = "Update Remark";
            AuditTrailController::create($action);

            return redirect()->back()->with('success', 'Remark Updated!');
        }

        return abort(500);
    }
}
