<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\AuditTrailController;

class RegisterController extends Controller
{
    /**
     * REGISTER STUDENT
     * @return view with message
     */
    public function register()
    {
    	return view('register');
    }


    /**
     * POST REGISTER STUDENT
     * @return success or error message
     */
    public function postRegister(Request $request)
    {
    	$request->validate([
            'student_number' => 'required',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|email|confirmed'
        ]);

        $student_number = $request['student_number'];
        $password = $request['password'];
        $email = $request['email'];

        // check student number
        $student = User::where('student_number', $student_number)->first();

        if(empty($student)) {
            // if no student found
            return redirect()->route('register')->with('error', 'Student Not Found!');
        }

        if($student->registered == 1) {
            // if registered
            return redirect()->route('register')->with('error', 'Student Already Registered!');
        }

        // check if they are able to register
        // qualification: next sy grade 7

        // show details
        return view('register-show-details', ['student' => $student, 'email' => $email, 'password' => bcrypt($password)]);
    }
}
