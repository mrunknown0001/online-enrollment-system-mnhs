<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\AuditTrailController;

class UserController extends Controller
{
    // FACULTY MANAGEMENT
    public function faculties()
    {
    	return view('admin.faculties');
    }


    // ADD FACULTY
    public function createFaculty()
    {
        return view('admin.faculty-add-edit', ['faculty' => null]);
    }


    // STORE/UPDATE FACULTY
    public function storeFaculty(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'employee_id' =>'required|unique:users,employee_id',
            'email' => 'nullable|unique:users,email|email',
            'mobile_number' => 'nullable|unique:users,mobile_number'
        ]);


        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $employee_id = $request['employee_id'];
        $email = $request['email'];
        $mobile_number = $request['mobile_number'];

        // add to database
        $f = new User();
        $f->firstname = $firstname;
        $f->lastname = $lastname;
        $f->employee_id = $employee_id;
        $f->email = $email;
        $f->mobile_number = $mobile_number;
        $f->password = bcrypt('secret');
        $f->user_type = 2; // faculty

        // if save is success, add activity log and return back with message
        if($f->save()) {
            $action = 'Added New Faculty';
            AuditTrailController::create($action);

            return redirect()->route('admin.add.faculty')->with('success', 'Faculty Added!');
        }

        return redriect()->route('admin.add.faculty')->with('error', 'Data Not Save! Please Try Again Later!');
    }


    // EDIT FACULTY
    public function updateFaculty($id = null)
    {

    }


    // ALL FACULTIES
    public function allFaculties()
    {
        // get all faculties
        $faculties = User::where('user_type', 2)->where('active', 1)->get();

        // format to follow
        $data = array(
            'fistname' => null,
            'lastname' => null,
            'employee_id' => null,
            'action' => null
        );

        if(count($faculties) > 0) {

            $data = null;

            foreach($faculties as $f) {

                $data[] = [
                    'firstname' => strtoupper($f->firstname),
                    'lastname' => strtoupper($f->lastname),
                    'employee_id' => $f->employee_id,
                    'action' => "<button class='btn btn-primary btn-xs'>Action</button>"
                ];

            }
        }

        return $data;
    }


    // STUDENT MANAGEMENT
    public function students()
    {
    	return view('admin.students');
    }
}
