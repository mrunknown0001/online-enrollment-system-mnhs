<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Strand;
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
     * display senior high subjects
     * @return display
     */
    public function seniorHighSubjects()
    {
        return view('admin.subjects-senior');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // all subjects for preerequisite
        $subjects = Subject::where('strand_id', null)->where('active', 1)->orderBy('title', 'asc')->get();

        return view('admin.subject-add-edit', ['subject' => null, 'subjects' => $subjects]);
    }

    public function seniorCreate()
    {
        $subjects = Subject::where('strand_id', '!=', null)->where('active', 1)->orderBy('title', 'asc')->get();

        $strands = Strand::where('active', 1)->orderBy('name', 'asc')->get();

        return view('admin.subject-senior-add-edit', ['subject' => null, 'subjects' => $subjects, 'strands' => $strands]);
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
            'code' => 'required',
            'grade_level' => 'required'
        ]);

        $subject_id = $request['subject_id'];

        $title = $request['title'];
        $code = $request['code'];
        $description = $request['description'];
        $prerequisite = $request['prerequisite'];
        $grade_level = $request['grade_level'];

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
        $subject->grade_level = $grade_level;

        if($subject->save()) {
            // add to audit trail
            AuditTrailController::create($action);
            return redirect()->route('admin.add.subject')->with('success', $message);
        }

        return redirect()->route('admin.add.subject')->with('error', $message);
        

    }


    /**
     * store subject for senior high school
     */
    public function storeSeniorSubject(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'code' => 'required',
            'grade_level' => 'required',
            'strand' => 'required',
            'semester' => 'required'
        ]);

        $subject_id = $request['subject_id'];

        $title = $request['title'];
        $code = $request['code'];
        $description = $request['description'];
        $prerequisite = $request['prerequisite'];
        $grade_level = $request['grade_level'];
        $strand = $request['strand'];
        $semester = $request['semester'];

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
        $subject->grade_level = $grade_level;
        $subject->strand_id = $strand;
        $subject->semester = $semester;

        if($subject->save()) {
            // add to audit trail
            AuditTrailController::create($action);
            return redirect()->route('admin.add.senior.subject')->with('success', $message);
        }

        return redirect()->route('admin.add.senior.subject')->with('error', $message);
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
        $id = $this->core->decryptString($id);

        $subject = Subject::findorfail($id);

        $subjects = Subject::where('strand_id', null)->where('active', 1)->orderBy('title', 'asc')->get();

        return view('admin.subject-add-edit', ['subject' => $subject, 'subjects' => $subjects]);
    }


    public function updateSeniorSubject($id)
    {
        $id = $this->core->decryptString($id);

        $subject = Subject::findorfail($id);

        $subjects = Subject::where('strand_id', '!=', null)->where('active', 1)->orderBy('title', 'asc')->get();

        $strands = Strand::where('active', 1)->orderBy('name', 'asc')->get();

        return view('admin.subject-senior-add-edit', ['subject' => $subject, 'subjects' => $subjects, 'strands' => $strands]);
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

        $subjects = Subject::where('strand_id', null)->where('active', 1)->orderBy('title', 'asc')->get();

        if(count($subjects) > 0) {

            $data = null;

            foreach($subjects as $s) {
                $data[] = [
                    'title' => ucwords($s->title),
                    'code' => strtoupper($s->code),
                    'description' => strtoupper($s->description),
                    'prerequisite' => strtoupper($this->core->getSubjectCode($s->prerequisite)),
                    'grade_level' => 'Grade '. $s->grade_level,
                    'action' => "<a href='" . route('admin.update.subject', ['id' => encrypt($s->id)]) . "' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Update</a> <button class='btn btn-danger btn-xs' onclick=\"removeSubject('" . encrypt($s->id) . "')\"><i class='fa fa-trash'></i> Remove</button>"
                ];
            }
        }

        return $data;
    }


    /**
     * all subjects senior high
     */
    public function allSubjectsSenior()
    {

        $data = array(
            'title' => null,
            'code' => null,
            'strand' => null,
            'prerequisite' => null,
            'action' => null
        );

        $subjects = Subject::where('strand_id', '!=', null)->where('active', 1)->orderBy('title', 'asc')->get();

        if(count($subjects) > 0) {

            $data = null;

            foreach($subjects as $s) {
                $data[] = [
                    'title' => ucwords($s->title),
                    'code' => strtoupper($s->code),
                    'strand' => $s->strand->name,
                    'prerequisite' => strtoupper($this->core->getSubjectCode($s->prerequisite)),
                    'grade_level' => 'Grade '. $s->grade_level,
                    'semester' => $s->semester == 1 ? 'First Semester' : 'Second Semester',
                    'action' => "<a href='" . route('admin.update.senior.subject', ['id' => encrypt($s->id)]) . "' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Update</a> <button class='btn btn-danger btn-xs' onclick=\"removeSubject('" . encrypt($s->id) . "')\"><i class='fa fa-trash'></i> Remove</button>"
                ];
            }
        }

        return $data;
    }
}
