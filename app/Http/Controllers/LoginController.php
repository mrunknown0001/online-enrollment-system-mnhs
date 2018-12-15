<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\AuditTrailController;

class LoginController extends Controller
{

	/**
	 * HOME PAGE
	 * @return home page
	 */
	public function home()
	{
        if(Auth::check()) {
            return $this->authCheck();
        }

		return view('home');
	}
    

    /**
     *  LOGIN PAGE
     *  @return login page
     */
    public function login()
    {
        if(Auth::check()) {
            return $this->authCheck();
        }

    	return view('login');
    }


    /**
     * POST LOGIN
     * @return dashboard of users or error message
     */
    public function postLogin(Request $request)
    {
        if(Auth::check()) {
            return $this->authCheck();
        }

    	$request->validate([
            'student_number' => 'required',
            'password' => 'required'
        ]);

        $student_number = $request['student_number'];
        $password = $request['password'];

        if(Auth::attempt(['student_number' => $student_number, 'password' => $password])) {

            // add to audit trail
            $action = 'Student Login';
            AuditTrailController::create($action);

            return redirect()->route('student.dashboard');
        }

        return redirect()->route('login')->with('error', 'Incorrect Student Number or Password!');
    }


    /**
     * EMPLOYEE LOGIN
     * 
     */
    public function empLogin()
    {
        if(Auth::check()) {
            return $this->authCheck();
        }

        return view('emp-login');
    }


    /**
     *  POST EMPLOEE LOGIN
     */
    public function postEmpLogin(Request $request)
    {
        if(Auth::check()) {
            return $this->authCheck();
        }
        
        $request->validate([
            'employee_id' => 'required',
            'password' => 'required'
        ]);

        $employee_id = $request['employee_id'];
        $password = $request['password'];

        if(Auth::attempt(['employee_id' => $employee_id, 'password' => $password])) {
            if(Auth::user()->user_type == 1) {

                // add to audit trail
                $action = 'Admin Login';
                AuditTrailController::create($action);

                return redirect()->route('admin.dashboard');
            }
            else if(Auth::user()->user_type == 2) {

                // add to audit trail
                $action = 'Faculty Login';
                AuditTrailController::create($action);

                return redirect()->route('faculty.dashboard');
            }
            
        }

        return redirect()->back()->with('error', 'Incorrect Employee ID or Password!');
    }



    /**
     * auth check
     */
    public function authCheck()
    {
        if(Auth::user()->user_type == 1) {
            return redirect()->route('admin.dashboard');
        }
        else if(Auth::user()->user_type == 2) {
            return redirect()->route('faculty.dashboard');
        }
        else if(Auth::user()->user_type == 3) {
            return redirect()->route('student.dashboard');
        }

        Auth::logout();

        return redirect()->route('login')->with('error', 'Error Occured!');
    }



    /**
     * LOGOUT FUNCTION
     * @return view for login
     */
    public function logout()
    {

        // add to audit trail
        $action = 'Logout';
        AuditTrailController::create($action);

        Auth::logout();

        return redirect()->route('login')->with('success', 'Logged Out!');
    }
}
