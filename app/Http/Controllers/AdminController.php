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
        $ay = date('Y') . '-' . date('Y', strtotime("+1 year"));
        $total_enroll = \App\EnrolledStudentCounter::where('active', 1)->first();
        $subjects = \App\Subject::where('active', 1)->count();
        $faculties = \App\User::where('user_type', 2)->where('active', 1)->count();

    	return view('admin.dashboard', ['total_enroll' => $total_enroll, 'subjects' => $subjects, 'faculties' => $faculties]);
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
}
