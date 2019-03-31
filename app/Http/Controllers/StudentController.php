<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Subject;

class StudentController extends Controller
{
	// STUDENT DASHBOARD
	public function dashboard()
	{
		return view('student.dashboard');
	}


	// STUDENT PROFILE
	public function profile()
	{
		return view('student.profile');
	}


	// STUDENT PASSWORD CHANGE
	public  function password()
	{
		return view('student.password-change');
	}


	// student evaluation method
	public function evaluation()
	{

		// get grade level of student

		// get all subjects and get all grades to display
		 
		$student = Auth::user();

		$grade_level = $student->info->grade_level;

		$subjects = Subject::where('grade_level', $grade_level)->where('active', 1)->get(); 

		$grades = NULL;

		foreach($subjects as $s) {
			$grades[] = [
				'subject' => $s->code . ' - ' . $s->title,
				'grade' => $this->core->equivalent($this->core->getStudentGrade($student->id, $s->id)),
				'remark' => $this->core->remarks($this->core->equivalent($this->core->getStudentGrade($student->id, $s->id)))
			];
 		}

 		// return $grades;


		return view('student.evaluation', ['grades' => $grades]);
	}


	// student schedules
	public function schedules()
	{
		return view('student.schedules');
	}

}
