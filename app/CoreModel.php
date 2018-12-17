<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class CoreModel extends Model
{
    // GET FULLNAME
    public function get_fullname()
    {
    	$fullname = Auth::user()->firstname . ' ' . Auth::user()->lastname;

    	return $fullname;
    }


    // CHECK EMPLOYEE ID
    public function check_employee_id($id, $user_id)
    {
    	if($id == $user_id) {
    		return true;
    	}

    	$emp = User::where('employee_id', $id)->first();

    	if(!empty($emp)) {
    		if($emp->employee_id != $user_id) {
    			return false;
    		}
    	}

    	return true;
    }




    // CHECK EMAIL
    public function check_email($email, $user_email)
    {
    	if($email == $user_email) {
    		return true;
    	}

    	$emp = User::where('email', $email)->first();

    	if(!empty($emp)) {
    		if($emp->email != $user_email) {
    			return false;
    		}
    	}

    	return true;
    }


    // CHECK MOBILE NUMBER
    public function check_mobile_number($number, $user_number)
    {
    	if($number == $user_number) {
    		return true;
    	}

    	$emp = User::where('mobile_number', $number)->first();

    	if(!empty($emp)) {
    		if($emp->mobile_number != $user_number) {
    			return false;
    		}
    	}

    	return true;
    }
}
