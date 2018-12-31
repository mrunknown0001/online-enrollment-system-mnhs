<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    // VIEW STUDENT GRADES
    public function viewGrades()
    {
    	return view('student.grades');
    }
}
