<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function schedules()
    {
    	return $this->hasMany('\App\Schedule', 'section_id', 'id')
    		->whereActive(1);
    }

}
