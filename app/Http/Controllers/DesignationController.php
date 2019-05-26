<?php

namespace App\Http\Controllers;

use App\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function designations()
    {
        return view('admin.designations');
    }


    // view designation
    public function facultyDesignation($id)
    {
        $id = $this->core->decryptString($id);

        $faculty = \App\User::findorfail($id);

        return view('admin.designation-faculty', ['faculty' => $faculty]);
    }


    // ALL DESIGNATIONS
    public function allDesignations()
    {
        $designations = \App\FacultyDesignation::get();

        $data = [
            'name' => NULL,
            'department' => NULL,
            'action' => NULL,
        ];

        if(count($designations) > 0) {
            $data = NULL;

            foreach($designations as $d) {
                $data[] = [
                    'name' => $this->core->get_fullname_by_id($d->user_id),
                    'department' => $this->core->getDepartmentName($d->department_id),
                    'action' => "<a href=" . route('admin.faculty.designation', ['id' => encrypt($d->user_id)]) . " class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</a>"
                ];
            }
        }

        return $data;
    }
}
