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


    // list of students per grade level
    public function listOfStudentPerGradeLevel()
    {
    	// select grade Level
    	return view('admin.report-student-per-grade-level');
    }


    public function postListOfStudentPerGradeLevel(Request $request)
    {
    	$request->validate([
    		'grade_level' => 'required'
    	]);

    	$grade_level = $request['grade_level'];

    	// get all students in grade
    	$students = \App\StudentSection::whereActive(1)->where('grade_level', $grade_level)->get();

    	// return $students;

        return view('admin.report-student-per-grade-level-view', ['students' => $students]);
    }



    // student per section
    public function ListOfStudentPerSection()
    {
        $sections = \App\Section::whereActive(1)->get();

        return view('admin.report-student-per-section', ['sections' => $sections]);
    }


    public function ListOfStudentPerSectionPost(Request $request)
    {
        $request->validate([
            'grade_level_section' => 'required'
        ]);

        $id = $request['grade_level_section'];

        $section = \App\Section::findorfail($id);

        $students = \App\StudentSection::whereActive(1)->where('section_id', $section->id)->get();

        return view('admin.report-student-per-section-view', ['section' => $section, 'students' => $students]);
    }
}