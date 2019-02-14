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
}
