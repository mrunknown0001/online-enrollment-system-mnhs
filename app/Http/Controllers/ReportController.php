<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
    	return view('admin.reports');
    }


    // LIST OF SECTIONS
    public function listOfSections()
    {
    	$sections = \App\Section::whereActive(1)->orderBy('grade_level', 'ASC')->orderBy('name', 'ASC')->get();

    	return view('admin.report-list-of-sections', ['sections' => $sections]);
    }
}
