<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssistedStudent extends Model
{
    public function student()
    {
    	return $this->belongsTo('App\User', 'student_id');
    }

    public function student_section()
    {
    	return $this->belongsTo('App\StudentSection', 'student_section_id');
    }
}
