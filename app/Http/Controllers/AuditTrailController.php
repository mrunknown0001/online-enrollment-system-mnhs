<?php

namespace App\Http\Controllers;

use App\AuditTrail;
use Auth;
use Illuminate\Http\Request;

class AuditTrailController extends Controller
{
    // ALL ACTIVITY LOGS
    public function index()
    {
        // $logs = AuditTrail::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.audit-trail');
    }


    // RECORD ACTIVITY LOG
    public static function create($action = null)
    {
    	$log = new AuditTrail();
    	$log->user_id = Auth::user()->id;
    	$log->action = $action;
    	$log->save();
    }



    // all logs
    public function allLogs()
    {
        $data = array(
            'user' => null,
            'activity' => null,
            'created_at' => null
        );

        $logs = AuditTrail::orderBy('created_at', 'desc')->get();

        if(count($logs) > 0) {

            $data = null;

            foreach($logs as $l) {

                $data[] = [
                    'user' => strtoupper($l->user->firstname . ' ' . $l->user->lastname) . ' ' . $l->user->student_number ,
                    'activity' => $l->action,
                    'created_at' => date('F d, Y h:i:s A', strtotime($l->created_at))
                ];

            }
        }

        return $data;
    }
}
