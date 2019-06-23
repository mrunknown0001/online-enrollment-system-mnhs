<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    public function section()
    {
    	return $this->belongsTo('App\Section', 'section_id');
    }

    public function strand()
    {
    	return $this->belongsTo('App\Strand', 'strand_id');
    }
}
