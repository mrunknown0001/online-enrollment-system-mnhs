<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionStudentCount extends Model
{
    public function section()
    {
    	return $this->belongsTo('App\Section', 'section_id');
    }
}
