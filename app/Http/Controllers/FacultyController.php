<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Section;
use App\StudentSection;
use App\Subject;
use App\User;

class FacultyController extends Controller
{
    // FACULTY DASHBOARD
    public function dashboard()
    {
        $subjects_assigned = \App\FacultyAssignment::where('faculty_id', Auth::user()->id)->where('active', 1)->count();

    	return view('faculty.dashboard', ['subjects_assigned' => $subjects_assigned]);
    }

    // FACULTY PROFILE
    public function profile()
    {
    	return view('faculty.profile');
    }

    // FACULTY PASSWORD CHANGE VIEW
    public function password()
    {
    	return view('faculty.password-change');
    }

    // VIEW ENROLED STUDENT UNDER ITS ASSIGNED SUBJECT
    public function myStudents()
    {

        // get all students in section and subjecdt assigned to the teacher
        
        return view('faculty.my-students');
    }


    // method use to view subjects assigned
    public function assignedSubject()
    {
        $subjects = Auth::user()->subjects;

        $current = \App\SchoolYear::whereActive(1)->first();

        $ay = NULL;
        if(!empty($current)) {
            $ay = $current->from . '-' . $current->to;
        }

        $sy = \App\FacultyAssignment::where('faculty_id', Auth::user()->id)
                            ->distinct()
                            ->get(['academic_year']);
        
        return view('faculty.my-subjects', ['subjects' => $subjects, 'sy' => $sy, 'ay' => $ay]);
    }



    // data on assigned subject
    public function allSubjectAssigned($ay)
    {
        $data = [
            'grade_section' => NULL,
            'subject' => NULl,
            'action' => NULL,
        ];

        $assigned = \App\FacultyAssignment::where('faculty_id', Auth::user()->id)
                                    ->where('academic_year', $ay)
                                    ->get();

        if(count($assigned) > 0) {
            $data = NULL;
            foreach($assigned as $a) {
                $data[] = [
                    'grade_section' => 'Grade ' . $a->section->grade_level . ' - ' . $a->section->name,
                    'subject' => $a->subject->code,
                    'action' => "<a href=" .  route('faculty.view.students', ['subject_id' => encrypt($a->subject_id), 'section_id' => encrypt($a->section_id)]) . " class='btn btn-success btn-xs'><i class='fa fa-eye'></i> View Students</a>
                        <a href=" . route('faculty.encode.grades', ['subject_id' => encrypt($a->subject_id), 'section_id' => encrypt($a->section_id)]) . " class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Encode Grades</a>"
                ];
            }
        }

        return $data;
    }


    // method use to view students enrolled in the subject, section and grade level
    public function subjectViewStudents($subject_id, $section_id)
    {
        $subject_id = $this->core->decryptString($subject_id);
        $section_id = $this->core->decryptString($section_id);

        $section = Section::findorfail($section_id);
        $subject = Subject::findorfail($subject_id);

        $students = StudentSection::where('active', 1)->where('section_id', $section->id)->get();

        return view('faculty.students', ['students' => $students, 'section' => $section, 'subject' => $subject]);
    }


    // method use to view stuent details
    public function studentViewDetails($id)
    {
        $id = $this->core->decryptString($id);

        $student = User::findorfail($id);

        return view('faculty.student-details', ['student' => $student]);
    }


    // method view use to encode grades on grade level section and subject assigned to faculty
    public function encodeStudentGrades($subject_id, $section_id)
    {
        $subject_id = $this->core->decryptString($subject_id);
        $section_id = $this->core->decryptString($section_id);

        $section = Section::findorfail($section_id);
        $subject = Subject::findorfail($subject_id);

        $students = StudentSection::where('active', 1)->where('section_id', $section->id)->get();


        return view('faculty.students-encode-grades', ['students' => $students, 'section' => $section, 'subject' => $subject]);
    }


    // method use to show schedules for faculties
    public function schedules()
    {
        // get section assigned
        // from section assigned get all schedules assigned to that grade level and section
        // get all schedules
        $faculty = Auth::user();

        $schedules = NULL;

        if(count($faculty->subjects) > 0) {
            // get all sched based on active subjects


            foreach($faculty->subjects as $s) {

                $sched = \App\Schedule::where('subject_id', $s->subject_id)
                            ->where('section_id', $s->section_id)
                            ->where('active', 1)
                            ->first();

                if(!empty($sched)) {
                    $schedules[] = [
                        'section' => $this->core->getGradeSection($sched->section_id),
                        'subject' => $this->core->getSubject($sched->subject_id),
                        'room' => $this->core->getRoomName($sched->room_id),
                        'day' => $this->core->getDay($sched->day),
                        'start_time' => $this->core->getTime($sched->start_time),
                        'end_time' => $this->core->getTime($sched->end_time) 
                    ];
                }

            }
        }

        // return $schedules;

        return view('faculty.schedules', ['schedules' => $schedules]);
    }
}
