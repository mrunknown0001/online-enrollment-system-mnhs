<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
		return view('student.evaluation');
	}


	// student schedules
	public function schedules()
	{
		return view('student.schedules');
	}

}
