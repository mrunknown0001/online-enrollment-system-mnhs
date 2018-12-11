<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	return $request; // testing
    }
}
