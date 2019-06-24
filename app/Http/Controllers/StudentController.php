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
		// return Auth::user()->enrollment_histories;
		return view('student.dashboard');
	}


	// view enrollment
	public function viewEnrollment($id)
	{
		$id = decrypt($id);

		$student_section = \App\StudentSection::findorfail($id);

		// get subjects
		$subjects = \App\Subject::where('grade_level', $student_section->grade_level)->get();

		$section = $student_section->section;

		// view schedule

		return view('student.print-priviews-enrollment', ['student' => Auth::user(), 'student_section' => $student_section, 'subjects' => $subjects, 'section' => $section]);
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
				'remark' => $this->core->remarks($this->core->equivalent($this->core->getStudentGrade($student->id, $s->id))),
				// 'remark' => $this->core->getRemark($student->id, $s->id)
				'grade' => $this->core->getStudentGrade($student->id, $s->id)
			];
 		}

 		// return $grades;


		return view('student.evaluation', ['student' => $student, 'grades' => $grades, 'sy' => $sy]);
	}


	// online enrollment module for students
	public function enrollment()
	{
		// check enrollment is active
		$enrollment = \App\Setting::find(1);

		// check if the enrolled student has active section, it means the online enrollment is not posible
		$student_section = \App\StudentSection::where('user_id', Auth::user()->id)->where('active', 1)->first();

		$student = Auth::user();

		$next_gl = $student->info->grade_level + 1;

		return view('student.enrollment', ['enrollment' => $enrollment, 'student_section' => $student_section, 'next_gl' => $next_gl]);
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

		$strand_id = NULL;

		if($section->strand_id != NULL) {
			$strand_id = $section->strand_id;
		}

		// get subjects
		$subjects = \App\Subject::where('grade_level', $section->grade_level)->where('active', 1)->get();

		return view('student.preview-subject', ['subjects' => $subjects, 'section' => $section, 'strand_id' => $strand_id]);
	}


	// enrollment save
	public function saveEnrollment(Request $request)
	{
		$section_id = $request['section_id'];
		$strand_id = Auth::user()->info->strand_id;

		$section = \App\Section::findorfail($section_id);

        $academic_year = \App\SchoolYear::whereActive(1)->first();

        $student = Auth::user();

        $strand = NULL;

        if($strand_id != NULL) {
        	$strand = \App\Strand::findorfail($strand_id);
        }


		// check student section 
		$check_sc = \App\StudentSection::where('user_id')->whereActive(1)->first();

		if(!empty($check_sc)) {
			return redirect()->route('student.enrollment')->with('error', 'Error Occured! Please Try Again');
		}

		// update grade level in student info
		Auth::user()->info->grade_level = $section->grade_level;
		Auth::user()->info->section_id = $section->id;
		Auth::user()->info->save();


		// add active student section
		$student_section = new \App\StudentSection();
		$student_section->user_id = Auth::user()->id;
		$student_section->section_id = $section->id;
		$student_section->grade_level = $section->grade_level;
		$student_section->school_year = $academic_year->from . '-' . $academic_year->to;
		$student_section->save();

		// add enrolled count in section student
		$section->enrolled += 1;
		$section->save(); 

		// enrolment history for students
        $std_enrollment = new \App\StudentEnrollmentHistory();
        $std_enrollment->user_id = Auth::user()->id;
        $std_enrollment->student_section_id = $student_section->id;
        $std_enrollment->school_year = $academic_year->from . '-' . $academic_year->to;
        $std_enrollment->type = 'Online Enrollment';
        $std_enrollment->save();


        if(empty($academic_year)) {
            return redirect()->route('student.enrollment')->with('error', 'No Active School Year!');
        }

        $ay_a = $academic_year->from . '-' . $academic_year->to;

        $enrolled_counter = \App\OnlineEnrollment::where('academic_year', $ay_a)
            ->where('active', 1)
            ->first();

        if(empty($enrolled_counter)) {
            $enrolled_counter = new \App\OnlineEnrollment();
            $enrolled_counter->academic_year = $academic_year->from . '-' . $academic_year->to;
            $enrolled_counter->count = 1;
            $enrolled_counter->save();
        }
        else {
            $enrolled_counter->count += 1;
            $enrolled_counter->save();            
        }


        $online_enrolled = new \App\OnlineEnrolledStudent();
        $online_enrolled->student_id = $student->id;
        $online_enrolled->section_id = $section->id;
        $online_enrolled->academic_year = $ay_a;
        $online_enrolled->student_section_id = $student_section->id;
        if($section->grade_level == 11 || $section->grade_level == 12) {
            $online_enrolled->strand_id = $strand->id;
            $online_enrolled->semester = $semester;
        }
        $online_enrolled->save();


        // add count to section student counter
        $section_student_counter = \App\SectionStudentCount::where('school_year', $ay_a)
                                        ->where('section_id', $section->id)
                                        ->first();

        if(empty($section_student_counter)) {
            // create new counter
            $ssc = new \App\SectionStudentCount();
            $ssc->section_id = $section->id;
            $ssc->school_year = $ay_a;
            $ssc->count = 1;
            $ssc->save();
        }
        else {
            // increment count by 1
            $section_student_counter->count += 1;
            $section_student_counter->save();
        }


		// student enrollment log
		AuditTrailController::create('Student enrolled in Grade ' . $section->grade_level .'-' . $section->name );


		// print COR
		$subjects = \App\Subject::where('grade_level', $section->grade_level)->get();

		return view('student.print-cor', ['student' => $student, 'section' => $section, 'subjects' => $subjects, 'strand' => $strand, 'student_section' => $student_section, 'message' => 'Enrollement Successful!']);

		// return redirect()->route('student.enrollment')->with('success', 'Online Registration Successful!');
	}

	// student select section of the selected grade level
	public function selectSection(Request $request)
	{
		return redirect()->route('student.dashboard');
	}






	// student schedules
	public function schedules()
	{
		$student = Auth::user();

		$grade_level = $student->info->grade_level;

		if(empty($student->student_section)) {
			return redirect()->route('student.dashboard')->with('error', 'Schedule Not Available!');
		}

		$section_id = $student->student_section->section->id;

		$section = $student->student_section->section;

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
                        'day' => str_replace(array('[',']','"',','), '',$sched->days),
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

		return view('student.schedules', ['student' => $student, 'student_section' => $student->student_section, 'section' => $section, 'schedules' => $schedules]);
	}

}
