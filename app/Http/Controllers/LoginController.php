<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\AuditTrailController;
use Illuminate\Database\QueryException;

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
            'user_type' => 'required',
            'identification' => 'required',
            'password' => 'required'
        ]);

        $identification = $request['identification'];
        $password = $request['password'];
        $remember_me = $request['remember_me'];
        $user_type = $request['user_type'];

        $error_message = 'Incorrect Login Details';

        if($user_type == 1) {
            $error_message = 'Incorrect Admin Employee ID or Password!';
        }
        elseif($user_type == 2) {
            $error_message = 'Incorrect Faculty Employee ID or Password!';
        }
        elseif($user_type == 3) {
            $error_message = 'Incorrect Student Number or Password!';
        }

        try {
            if(Auth::attempt(['student_number' => $identification, 'password' => $password], $remember_me) || Auth::attempt(['employee_id' => $identification, 'password' => $password], $remember_me)) {

                if(Auth::user()->status == 'Inactive' || Auth::user()->status == 'Transfered') {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Account Inactive. Please Contact Administrator!');
                }

                if(Auth::user()->active != 1) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Inactive Student!');
                }


                // check if user_type is correct
                if(Auth::user()->user_type != $user_type) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Invalid User Type');
                }

                // add to audit trail
                $action = 'Login';
                AuditTrailController::create($action);

                // return redirect()->route('student.dashboard');

                return $this->authCheck();
            }
        }
        catch (QueryException $ex) {
            return redirect()->back()->with('error', 'Please Check Your Database Server');
        }

        return redirect()->route('login')->with('error', $error_message);
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
        $remember_me = $request['remember_me'];

        try {
            if(Auth::attempt(['employee_id' => $employee_id, 'password' => $password], $remember_me)) {
                if(Auth::user()->active != 1) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Inactive User!');
                }

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
        }
        catch (QueryException $ex) {
            return redirect()->back()->with('error', 'Please Check Your Database Server.');
            // $ex->getMessage();
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
