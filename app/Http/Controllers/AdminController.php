<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controller\AuditTrailController;

class AdminController extends Controller
{
    // ADMIN DASHBOARD
    public function dashboard()
    {
    	return view('admin.dashboard');
    }
}
