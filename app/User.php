<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    // protected $primaryKey = 'user_id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'mobile_number', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // STUDENT INFO
    public function info()
    {
        return $this->hasOne('App\StudentInfo', 'user_id', 'id');
    }


    // student section
    public function student_section()
    {
        return $this->hasOne('App\StudentSection', 'user_id');
    }


    // faculty subjects
    public function subjects()
    {
        return $this->hasMany('App\FacultyAssignment', 'faculty_id', 'id')->whereActive(1);
    }



    // GLOBAL FUNCTION ACCESS FOR USERS USING AUTH


    /**
     * method use to get fullname of user
     *
     */
    public function fullname()
    {
        $fullname = Auth::user()->firstname . ' ' . Auth::user()->lastname;

        return $fullname;
    }


    /*
     * get grades of student if any
     *
     */
    public function getGrades($user_id, $subject_id)
    {
        // return $user_id;
        // return $subject_id;
        $grade = \App\Grade::where('user_id', $user_id)->where('subject_id', $subject_id)->first();

        return $grade;
    }




    
}
