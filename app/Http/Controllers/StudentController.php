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

		$sy = \App\SchoolYear::whereActive(1)->first();

		$subjects = Subject::where('grade_level', $grade_level)->where('active', 1)->get(); 

		$grades = NULL;

		foreach($subjects as $s) {
			$grades[] = [
				'subject' => $s->code . ' - ' . $s->title,
				// 'grade' => $this->core->equivalent($this->core->getStudentGrade($student->id, $s->id)),
				// 'remark' => $this->core->remarks($this->core->equivalent($this->core->getStudentGrade($student->id, $s->id)))
				'remark' => $this->core->getRemark($student->id, $s->id)
			];
 		}

 		// return $grades;


		return view('student.evaluation', ['grades' => $grades, 'sy' => $sy]);
	}


	// online enrollment module for students
	public function enrollment()
	{
		// check enrollment is active
		$enrollment = \App\Setting::find(1);

		// check if the enrolled student has active section, it means the online enrollment is not posible
		$student_section = \App\StudentSection::where('user_id', Auth::user()->id)->where('active', 1)->first();

		return view('student.enrollment', ['enrollment' => $enrollment, 'student_section' => $student_section]);
	}


	// studen select grade level
	public function selectGradeLevel(Request $request)
	{
		$request->validate([
			'grade_level' => 'required'
		]);

		$grade_level = $request['grade_level'];

		$student = Auth::user();

		$next_gl = $student->info->grade_level + 1;

		$enrollment = \App\Setting::find(1);

		// get the last grade level
		// validate that the selected grade level is greater than the previous grade level of the student

		if($next_gl == $grade_level) {
			// get all section on grade level
			$sections = \App\Section::where('grade_level', $grade_level)->whereActive(1)->get();
			// return view in selecting section on selected grade Level

			// grade 7 to 10
			return view('student.select-section', ['sections' => $sections, 'enrollment' => $enrollment]);


			// grade 11 and 12
		}
		else {
			return redirect()->back()->with('error', 'Invalid Grade Level');
		}

	}



	// preview subects junior high grade 7 to 10
	public function previewSubjecToEnroll(Request $request)
	{
		$request->validate([
			'section' => 'required'
		]);

		$id = $request['section'];

		$section = \App\Section::findorfail($id);

		// get subjects
		$subjects = \App\Subject::where('grade_level', $section->grade_level)->where('active', 1)->get();

		return view('student.preview-subject', ['subjects' => $subjects, 'section' => $section]);
	}


	// enrollment save
	public function saveEnrollment(Request $request)
	{
		return $request;
	}

	// student select section of the selected grade level
	public function selectSection(Request $request)
	{
		return $request;
	}






	// student schedules
	public function schedules()
	{
		$student = Auth::user();

		$grade_level = $student->info->grade_level;
		$section_id = $student->student_section->section->id;

		$subjects = Subject::where('grade_level', $grade_level)->get(); 

        if(count($subjects) > 0) {
        	$schedules = NULL;
        	// return 'hey';
            foreach($subjects as $s) {

                $sched = \App\Schedule::where('subject_id', $s->id)
                            ->where('section_id', $section_id)
                            ->where('active', 1)
                            ->first();

                if(!empty($sched)) {
                    $schedules[] = [
                        'subject' => $this->core->getSubject($s->id),
                        'room' => $this->core->getRoomName($sched->room_id),
                        'day' => $this->core->getDay($sched->day),
                        'start_time' => $this->core->getTime($sched->start_time),
                        'end_time' => $this->core->getTime($sched->end_time) 
                    ];
                }
                else {
                	$schedules[] = [
                		'subject' => $this->core->getSubject($s->id),
                        'room' => 'N/A',
                        'day' => 'N/A',
                        'start_time' => 'N/A',
                        'end_time' => 'N/A' 
                	];
                }

            }
        }

        // return $schedules;

		return view('student.schedules', ['schedules' => $schedules]);
	}

}
