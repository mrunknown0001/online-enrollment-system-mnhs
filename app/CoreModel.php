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


    // check payload in decrypting encrypted id
    public function decryptString($str)
    {
        try {
            $str = decrypt($str);

            return $str;
        }
        catch (\Exception $e) {
            return null;
        }
    }


    // GET SUBJECT CODE
    public function getSubjectCode($id)
    {
        if($id != null) {
            $subject = \App\Subject::findorfail($id);

            return $subject->code;
        }

        return 'N/A';

    }


    // get strand code
    public function getStrandCode($id)
    {
        if($id != null) {
            $strand = \App\Strand::findorfail($id);

            return $strand->code;
        }

        return 'N/A';
    }


    




    public function time_range()
    {
        $time = [
            [
                'id' => '1',
                'time' => '7:00am'
            ],
            [
                'id' => '2',
                'time' => '7:30am'
            ],
            [
                'id' => '3',
                'time' => '8:00am'
            ],
            [
                'id' => '4',
                'time' => '8:30am'
            ],
            [
                'id' => '5',
                'time' => '9:00am'
            ],
            [
                'id' => '6',
                'time' => '9:30am'
            ],
            [
                'id' => '7',
                'time' => '10:00am'
            ],
            [
                'id' => '8',
                'time' => '10:30am'
            ],
            [
                'id' => '9',
                'time' => '11:00am'
            ],
            [
                'id' => '10',
                'time' => '11:30am'
            ],
            [
                'id' => '11',
                'time' => '12:00pm'
            ],
            [
                'id' => '12',
                'time' => '12:30pm'
            ],
            [
                'id' => '13',
                'time' => '1:00pm'
            ],
            [
                'id' => '14',
                'time' => '1:30pm'
            ],
            [
                'id' => '15',
                'time' => '2:00pm'
            ],
            [
                'id' => '16',
                'time' => '2:30pm'
            ],
            [
                'id' => '17',
                'time' => '3:00pm'
            ],
            [
                'id' => '18',
                'time' => '3:30pm'
            ],
            [
                'id' => '19',
                'time' => '4:00pm'
            ],
            [
                'id' => '20',
                'time' => '4:30pm'
            ],
            [
                'id' => '21',
                'time' => '5:00pm'
            ],
            [
                'id' => '22',
                'time' => '5:30pm'
            ],
            [
                'id' => '23',
                'time' => '6:00pm'
            ],
        ];

        return $time;
    }

    public function days()
    {
        $days = [
            [
                'id' => 1,
                'name' => 'Monday',
            ],
            [
                'id' => 2,
                'name' => 'Tuesday',
            ],
            [
                'id' => 3,
                'name' => 'Wednesday',
            ],
            [
                'id' => 4,
                'name' => 'Thursday',
            ],
            [
                'id' => 5,
                'name' => 'Friday',
            ],
            [
                'id' => 7,
                'name' => 'Monday',
            ],
            [
                'id' => 7,
                'name' => 'Sunday',
            ]
        ];

        return $days;
    }
}
