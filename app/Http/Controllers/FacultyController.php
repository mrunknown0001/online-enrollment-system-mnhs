<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
}
