<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyDesignation extends Model
{
    public function department()
    {
    	return $this->belongsTo('App\Department', 'department_id');
    }
}
