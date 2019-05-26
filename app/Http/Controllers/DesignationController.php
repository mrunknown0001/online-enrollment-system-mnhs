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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        //
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
                    'action' => "<button class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</button>"
                ];
            }
        }

        return $data;
    }
}
