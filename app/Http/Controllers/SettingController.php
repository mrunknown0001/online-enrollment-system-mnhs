<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Setting Controller index
     */
    public function index()
    {
    	return view('admin.settings');
    }
}
