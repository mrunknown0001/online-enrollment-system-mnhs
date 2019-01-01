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



    // on end of semester 
    // registered to 0
    // existing to 1
    // active 1 or 0 if graduate or not or droppedout
    // all sections to inactive
    // 
}
