<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

	/**
	 * HOME PAGE
	 * @return home page
	 */
	public function home()
	{
		return view('home');
	}
    

    /**
     *  LOGIN PAGE
     *  @return login page
     */
    public function login()
    {
    	return view('login');
    }


    /**
     * POST LOGIN
     * @return dashboard of users or error message
     */
    public function postLogin(Request $request)
    {
    	$request->validate([
            'student_number' => 'required',
            'password' => 'required'
        ]);

        $student_number = $request['student_number'];
        $password = $request['password'];

        if(Auth::attempt(['student_number' => $student_number, 'password' => $password])) {
            return redirect()->route('student.dashboard');
        }
    }


    /**
     * EMPLOYEE LOGIN
     * 
     */
    public function empLogin()
    {
        return view('emp-login');
    }


    /**
     *  POST EMPLOEE LOGIN
     */
    public function postEmpLogin(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'password' => 'required'
        ]);

        $employee_id = $request['employee_id'];
        $password = $request['password'];

        if(Auth::attempt(['employee_id' => $employee_id, 'password' => $password])) {
            if(Auth::user()->user_type == 1) {
                return redirect()->route('admin.dashboard');
            }
            else if(Auth::user()->user_type == 2) {
                return redirect()->route('faculty.dashboard');
            }
            
        }

        return redirect()->back()->with('error', 'Incorrect Employee ID or Password!');
    }



    /**
     * LOGOUT FUNCTION
     * @return view for login
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logged Out!');
    }
}
