<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\AuditTrailController;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function departments()
    {
        return view('admin.departments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department-add-edit', ['dept' => NULL]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required',
            'department_description' => 'nullable'
        ]);

        $name = $request['department_name'];
        $desc = $request['department_description'];

        $dept_id = $request['dept_id'];

        if($dept_id == NULL) {
            // create
            $dept = new Department();
            $action = 'Created Department';
        }
        else {
            // update
            $dept = Department::findorfail($dept_id);
            $action = 'Updated Department';
        }


        $dept->department_name = $name;
        $dept->department_description = $desc;

        if($dept->save()) {
            AuditTrailController::create($action);
            return redirect()->route('admin.department.add')->with('success', 'Department Saved'); 
        }

        return redirect()->route('admin.department.add')->with('error', 'Error in Saving. Please Try Again Later.');
    }


    // method use to update department
    public function update($id = NULL)
    {
        $id = $this->core->decryptString($id);

        $dept = Department::findorfail($id);

        return view('admin.department-add-edit', ['dept' => $dept]);


    }



    // METHOD USE TO REMOVE DEPARTMENT IN ACTIVE LIST
    public function remove($id = NULL)
    {
        $id = $this->core->decryptString($id);

        $dept = Department::find($id);

        $dept->active = 0;
        $dept->save();

        $action = 'Removed Department: ' . $dept->department_name;
        AuditTrailController::create($action);
    }


    // JSON ALL DEPARTMENT
    public function allDepartments()
    {
        $departments = Department::where('active', 1)->get();

        $data = [
            'department_name' => NULL,
            'department_description' => NULL,
            'action' => NULL
        ];

        if(count($departments) > 0) {
            $data = NULL;

            foreach($departments as $d) {
                $data[] = [
                    'department_name' => $d->department_name,
                    'department_description' => $d->department_description,
                    'action' => "<a href='" . route('admin.update.department', ['id' => encrypt($d->id)]) . "' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Update</a> <button class='btn btn-danger btn-xs' onclick=\"remove_department('" . encrypt($d->id) . "')\"><i></i> Remove</button>"
                ];
            }
        }

        return $data;
    }
}
