<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyAssignment extends Model
{
    public function section()
    {
    	return $this->belongsTo('App\Section', 'section_id');
    }

    public function subject()
    {
    	return $this->belongsTo('App\Subject', 'subject_id');
    }

    public function faculty()
    {
    	return $this->belongsTo('App\User', 'faculty_id');
    }
}
