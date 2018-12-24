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

}
