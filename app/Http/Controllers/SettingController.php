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
        $sy = \App\SchoolYear::whereActive(1)->first();

    	return view('admin.settings', ['setting' => $setting, 'sy' => $sy]);
    }



    public function postToggleEnrollment(Request $request)
    {
        $enrollment = $request['enrollment'];

        if($enrollment == 0) {
            // check if there is active school year
            $sy = \App\SchoolYear::whereActive(1)->first();

            $psy = \App\SchoolYear::whereActive(0)->orderBy('created_at', 'desc')->first();

            if(empty($sy)) {
                if(empty($psy)) {
                    $from = date('Y');
                    $to = date('Y', strtotime("+1 year"));                  
                }
                else {
                    $from = $psy->to;
                    $to = $from + 1;
                }

                $sy = new \App\SchoolYear();
                $sy->from = $from;
                $sy->to = $to;
                $sy->save();  

            }

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


    public function closeSchoolYear(Request $request)
    {
        // find active sy
        $sy = \App\SchoolYear::whereActive(1)->first();
        // make it inactive
        $sy->active = 0;
        $sy->save();

        // student section to inactive
        DB::table('student_sections')->whereActive(1)->update(['active' => 0]);

        // all active schedules to inactive

        DB::table('settings')->where('id', 1)->update(['enrollment' => 0]);
        DB::table('settings')->where('id', 1)->update(['semester' => 1]);
        DB::table('sections')->where('active', 1)->update(['enrolled' => 0]);

        AuditTrailController::create('School Year Closed');

        return redirect()->back()->with('success', 'School Year is Closed');

    }



    public function postToggleSemester(Request $request)
    {
        $semester = $request['semester'];

        $setting = DB::table('settings')->where('id', 1)->first();

        if($setting->enrollment != 1) {
            return redirect()->back()->with('error', 'Please Activate Enrollment!');
        }


        // all active sections of grade 11 and 12 will be inactive
        DB::table('student_sections')->whereActive(1)->where('grade_level', 11)->orWhere('grade_level', 12)->update(['active' => 0]);


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
