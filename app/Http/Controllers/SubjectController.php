<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\AuditTrailController;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subjects');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.subject-add-edit', ['subject' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'code' => 'required'
        ]);

        $subject_id = $request['subject_id'];

        $title = $request['title'];
        $code = $request['code'];
        $description = $request['description'];
        $prerequisite = $request['prerequisite'];

        // check if subject id is null
        if($subject_id == null) {
            // create subject
            $subject = new Subject();

            $action = 'Added New Subject';
            $message = 'Subject Added!';

        }
        else {
            // udpate subject
            $subject = Subject::findorfail($subject_id);

            $action = 'Update Subject';
            $message = 'Subject Updated!';

        }

        $subject->title = $title;
        $subject->code = $code;
        $subject->description = $description;
        $subject->prerequisite = $prerequisite;

        if($subject->save()) {
            // add to audit trail
            AuditTrailController::create($action);
            return redirect()->route('admin.add.subject')->with('success', $message);
        }

        return redirect()->route('admin.add.subject')->with('error', $message);
        

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $id = decrypt($id);

        $subject = Subject::findorfail($id);

        return view('admin.subject-add-edit', ['subject' => $subject]);
    }



    /**
     * Remove subject
     * making active = 0
     * @return null
     */
    public function remove($id)
    {
        $id = decrypt($id);

        $subject = Subject::findorfail($id);
        $subject->active = 0;

        if($subject->save()) {
            $action = 'Subject Removed';
            AuditTrailController::create($action);
        }
    }


    /**
     * all subjects
     */
    public function allSubjects()
    {
        $data = array(
            'title' => null,
            'code' => null,
            'description' => null,
            'prerequisite' => null,
            'action' => null
        );

        $subjects = Subject::where('active', 1)->orderBy('title', 'asc')->get();

        if(count($subjects) > 0) {

            $data = null;

            foreach($subjects as $s) {
                $data[] = [
                    'title' => ucwords($s->title),
                    'code' => strtoupper($s->code),
                    'description' => strtoupper($s->description),
                    'prerequisite' => $s->prerequisite,
                    'action' => "<a href='" . route('admin.update.subject', ['id' => encrypt($s->id)]) . "' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Update</a> <button class='btn btn-danger btn-xs' onclick=\"removeSubject('" . encrypt($s->id) . "')\"><i class='fa fa-trash'></i> Remove</button>"
                ];
            }
        }

        return $data;
    }
}
