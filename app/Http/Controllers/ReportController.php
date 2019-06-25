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
    	// $sections = \App\Section::whereActive(1)->orderBy('grade_level', 'ASC')->orderBy('name', 'ASC')->get();

        // get all year in section stuent count
        $ssc = \App\SectionStudentCount::distinct()->orderBy('school_year', 'desc')->get(['school_year']);

        $sy = \App\SchoolYear::whereActive(1)->first();
        $current = null;
        if(!empty($sy)) {
            $current = $sy->from . '-' . $sy->to;
        }

    	return view('admin.report-list-of-sections', ['ssc' => $ssc, 'current' => $current]);
    }


    // list of section by school year
    public function listOfSectionsData($academic_year)
    {
        // get all section by academic year
        $sections = \App\SectionStudentCount::where('school_year', $academic_year)->get();

        $data = [
            'section' => NULL,
            'grade_level' => NULL,
            'count' => NULL,
        ];

        if(count($sections) > 0) {
            $data = NULL;
            foreach($sections as $s) {
                $data[] = [
                    'section' => $s->section->name,
                    'grade_level' => 'Grade ' . $s->section->grade_level,
                    'count' => $s->count
                ];
            }
        }

        return $data;
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



    // listOfJuniorHighStudents
    public function listOfJuniorHighStudents()
    {
        // get all junior high students in student subjects
        $students = \App\StudentSection::whereActive(1)
                                ->where('grade_level', 7)
                                ->orWhere('grade_level', 8)
                                ->orWhere('grade_level', 9)
                                ->orWhere('grade_level', 10)
                                ->get();

        // return $students;

        // return view with report junior high students
        return view('admin.report-junior-high-students', ['students' => $students]);
    }


    public function listOfSeniorHighStudents()
    {
        $students = \App\StudentSection::whereActive(1)
                                ->where('grade_level', 11)
                                ->orWhere('grade_level', 12)
                                ->get();

        // return $students;

        // return view with report junior high students
        return view('admin.report-senior-high-students', ['students' => $students]);
    }
}
