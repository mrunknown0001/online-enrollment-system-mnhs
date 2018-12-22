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
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }


    /**
     * all subjects
     */
    public function allSubjects()
    {
        $data = array(
            'title' => null,
            'description' => null,
            'prerequisite' => null,
            'action' => null
        );


        return $data;
    }
}
