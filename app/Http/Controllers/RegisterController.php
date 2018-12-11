<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	return $request; // testing
    }
}
