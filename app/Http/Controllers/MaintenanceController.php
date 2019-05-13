<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function home()
    {
    	return view('admin.maintenance');
    }
}
