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


    // get full name by id
    public function get_fullname_by_id($id)
    {
        $user = \App\User::find($id);

        $fullname = $user->firstname . ' ' . $user->lastname;

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



    // get grade and section
    public function getGradeSection($id)
    {
        $section = \App\Section::find($id);

        $grade_section = 'Grade ' . $section->grade_level . ' - ' . $section->name;

        return $grade_section;
    }


    // get room name
    public function getRoomName($id)
    {
        $room = \App\Room::find($id);

        return $room->name;
    }


    // check enrollment
    public function checkEnrollment()
    {
        $setting = \App\Setting::find(1);

        if($setting->enrollment == 1) {
            return true;
        }

        return false;
    }


    // get grade of student
    public function getStudentGrade($student_id, $subject_id)
    {
        $grade = \App\Grade::where('user_id', $student_id)->where('subject_id', $subject_id)->first();

        if(!empty($grade)) {
            return $grade->grade;
        }

        return 'N/A';
    }


    // get department
    public function getDepartmentName($id)
    {
        $department = \App\Department::find($id);

        return $department->department_name;
    }


    // get position
    public function get_position($id)
    {
        $user = \App\User::find($id);

        return $user->position;
    }



    /////////////////////////
    // find the equivalent //
    /////////////////////////
    public function equivalent($ave = NULL)
    {
        $e = 5.00;

        if($ave != 0) {

            switch ($ave) {

                case $ave >= 99.00 && $ave == 100:
                    $e = 1.00;
                    break;
                
                case $ave <= 98.99 && $ave >= 95.00:
                    $e = 1.25;
                    break;

                case $ave <= 94.99 && $ave >= 92.00:
                    $e = 1.50;
                    break;

                case $ave <= 91.99 && $ave >= 89.00:
                    $e = 1.75;
                    break;

                case $ave <= 88.99 && $ave >= 86.00:
                    $e = 2.00;
                    break;

                case $ave <= 85.99 && $ave >= 83.00:
                    $e = 2.25;
                    break;

                case $ave <= 82.99 && $ave >= 80.00:
                    $e = 2.50;
                    break;

                case $ave <= 79.99 && $ave >= 77.00:
                    $e = 2.75;
                    break;

                case $ave <= 76.99 && $ave >= 75.00:
                    $e = 3.00;
                    break;

                case $ave < 74.99:
                    $e = 5.00;
                    break;

                default:
                    $e = 5.00;
                    break;
            }

        }


        return $e;
    }


    public function remarks($grade = NULL)
    {
        if($grade != NULL) {
            if($grade <= 3) {
                return 'Passed';
            }
            else {
                return 'Failed';
            }
        }

        return 'N/A';
    }


    public function getDay($id)
    {
        switch ($id) {
            case 1:
                return 'Monday';
                break;

            case 2:
                return 'Tuesday';
                break;

            case 3:
                return 'Wednesday';
                break;

            case 4:
                return 'Thursday';
                break;

            case 5:
                return 'Friday';
                break;

            case 6:
                return 'Saturday';
                break;
            
            default:
                return 'Sunday';
                break;
        }
    }


    public function getTime($id)
    {
        $times = $this->time_range();

        foreach($times as $t) {
            if($t['id'] == $id) {
                return $t['time'];
            }
        }

        return 'N/A';
    }



    public function getSubject($id)
    {
        $subject = \App\Subject::find($id);

        return $subject->title;
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


    // check if subject is assigned to faculty
    public function checkSubjectAssignment($subject_id, $faculty_id, $section_id)
    {
        // check in subject assignment
        $assignment = \App\FacultyAssignment::where('subject_id', $subject_id)
                    ->where('faculty_id', $faculty_id)
                    ->where('section_id', $section_id)
                    ->where('active', 1)
                    ->first();

        if(!empty($assignment)) {
            return true;
        }

        return false;

    }


    
}
