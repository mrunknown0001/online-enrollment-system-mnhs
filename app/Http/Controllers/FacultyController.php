<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    // FACULTY DASHBOARD
    public function dashboard()
    {
    	return view('faculty.dashboard');
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
