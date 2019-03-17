<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentSection;
use App\Subject;
use App\Section;
use App\Grade;

use DB;

class GradeController extends Controller
{
    // VIEW STUDENT GRADES
    public function viewGrades()
    {
    	return view('student.grades');
    }


    // METHOD USE TO SAVE GRADES OF STUDENTS
    public function saveGrade(Request $request)
    {
    	$subject_id = $request['subject_id'];
    	$section_id = $request['section_id'];

    	$subject = Subject::findorfail($subject_id);
    	$section = Section::findorfail($section_id);

    	$students = StudentSection::where('active', 1)->where('section_id', $section_id)->get();

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
    			];

    		}

    		// save using query builder
    		if(DB::table('grades')->insert($grades)) {
    			return redirect()->back()->with('success', 'Student Grade Saved!');
    		}
    	}

    	return redirect()->back()->with('error', 'No Students in the Subject Section');

    }
}
