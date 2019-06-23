<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controller\AuditTrailController;

class AdminController extends Controller
{
    // ADMIN DASHBOARD
    public function dashboard()
    {
        $online_enrollment = \App\OnlineEnrollment::where('active', 1)->first();
        $assisted_students = \App\EnrolledStudentCounter::where('active', 1)->first();
        $subjects = \App\Subject::where('active', 1)->count();
        $faculties = \App\User::where('user_type', 2)->where('active', 1)->count();

    	return view('admin.dashboard', ['online_enrollment' => $online_enrollment, 'assisted_students' => $assisted_students, 'subjects' => $subjects, 'faculties' => $faculties]);
    }

    // ADMIN VIEW PROFILE
    public function profile()
    {
    	return view('admin.profile');
    }


    // ADMIN PASSWORD VIEW TO CHANGE PASSWORD
    public function password()
    {
    	return view('admin.password-change');
    }


    // get all subjects
    public function getSubjects($id)
    {
        $subjects = \App\Subject::where('grade_level', $id)->get();

        return $subjects;
    }


    // get all grade level
    public function getGradeLevel($id)
    {
        $section = \App\Section::find($id);

        return $section->grade_level;
    }
}
