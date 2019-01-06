<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function strand()
    {
    	return $this->belongsTo('App\Strand', 'strand_id');
    }
}
