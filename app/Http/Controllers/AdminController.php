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
    	return view('admin.dashboard');
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
