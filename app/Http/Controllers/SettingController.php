<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuditTrailController;
use DB;

class SettingController extends Controller
{
    /**
     * Setting Controller index
     */
    public function index()
    {
        $setting = DB::table('settings')->first();

    	return view('admin.settings', ['setting' => $setting]);
    }



    public function postToggleEnrollment(Request $request)
    {
        $enrollment = $request['enrollment'];

        if($enrollment == 0) {
            DB::table('settings')->where('id', 1)->update(['enrollment' => 1]);
            AuditTrailController::create('Activate Enrollment');
            return redirect()->back()->with('success', 'Enrollment is Active!');
        }
        elseif($enrollment == 1) {
            DB::table('settings')->where('id', 1)->update(['enrollment' => 0]);
            AuditTrailController::create('Deactivate Enrollment');
            return redirect()->back()->with('success', 'Enrollment is Closed!');
        }
        else {
            return abort(404);
        }

    }



    public function postToggleSemester(Request $request)
    {
        $semester = $request['semester'];

        $setting = DB::table('settings')->where('id', 1)->first();

        if($setting->enrollment != 1) {
            return redirect()->back()->with('error', 'Please Activate Enrollment!');
        }

        if($semester == 1) {
            DB::table('settings')->where('id', 1)->update(['semester' => 2]);
            AuditTrailController::create('Second Semester Selected');
            return redirect()->back()->with('success', 'Second Semester Selected!');
        }
        elseif($semester == 2) {
            DB::table('settings')->where('id', 1)->update(['semester' => 1]);
            AuditTrailController::create('First Semester Selected');
            return redirect()->back()->with('success', 'First Semester Selected!');
        }
        else {
            return abort(404);
        }
    }
}
