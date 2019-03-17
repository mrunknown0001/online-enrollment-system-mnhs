<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Section;
use App\StudentSection;
use App\Subject;

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
        return view('faculty.my-students');
    }


    // method use to view subjects assigned
    public function assignedSubject()
    {
        $subjects = Auth::user()->subjects;
        return view('faculty.my-subjects', ['subjects' => $subjects]);
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


    // method use to show schedules for faculties
    public function schedules()
    {
        return view('faculty.schedules');
    }
}
