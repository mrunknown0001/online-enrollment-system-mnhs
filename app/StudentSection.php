<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSection extends Model
{
    // section
    public function section()
    {
    	return $this->belongsTo('App\Section', 'section_id');
    }

    // students
    public function student()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }


    // assessor
    public function assessor()
    {
        return $this->belongsTo('App\User', 'assessor_id');
    }

}
