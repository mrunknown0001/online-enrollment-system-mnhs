<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class CoreModel extends Model
{
    // GET FULLNAME
    public function get_fullname()
    {
    	$fullname = Auth::user()->firstname . ' ' . Auth::user()->lastname;

    	return $fullname;
    }
}
