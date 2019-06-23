<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEnrollmentHistory extends Model
{
	public function student()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

    public function student_section()
    {
    	return $this->belongsTo('App\StudentSection', 'student_section_id');
    }
}
