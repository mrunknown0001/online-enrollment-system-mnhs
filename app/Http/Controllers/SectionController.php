<?php

namespace App\Http\Controllers;

use App\Section;
use App\Strand;
use Illuminate\Http\Request;
use App\Http\Controllers\AuditTrailController;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sections');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strands = Strand::where('active', 1)->get();

        return view('admin.section-add-edit', ['section' => null, 'strands' => $strands]);
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
            'name' => 'required',
            'grade_level' => 'required',
            'student_limit' => 'required|numeric'
        ]);

        $name = $request['name'];
        $grade_level = $request['grade_level'];
        $student_limit = $request['student_limit'];
        $strand_id = $request['strand'];

        $section_id = $request['section_id'];

        if($strand_id != null) {
            $strand = Strand::findorfail($strand_id);
        }

        // check grade 11 & 12 only for strand
        if($grade_level < 11 && $strand_id != null) {
            return redirect()->back()->with('error', 'Grade Level Can\'t Have Strand');
        }
        elseif($grade_level > 10 && $strand_id == null) {
            return redirect()->back()->with('error', 'Grade Level Required a Strand');
        }


        if($section_id == null) {
            // create section
            $section = new Section();

            $action = 'New Section Created!';
            $message = 'Section Created';
        }
        else {
            // update
            $section = Section::findorfail($section_id);

            $action = 'Section Updated!';
            $message = 'Section Updated';
        }

        $section->name = $name;
        $section->grade_level = $grade_level;
        $section->strand_id = $strand_id;
        $section->school_year = date('Y') . '-' . date('Y', strtotime("+1 year"));
        $section->student_limit = $student_limit;

        // save with log and redirect
        if($section->save()) {
            AuditTrailController::create($action);

            return redirect()->route('admin.add.section')->with('success', $message);
        }

        return redirect()->route('admin.sections')->with('error', 'Error Occured! Please Try Again Later!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $id = $this->core->decryptString($id);

        $section = Section::findorfail($id);
        $strands = Strand::where('active', 1)->get();

        return view('admin.section-add-edit', ['section' => $section, 'strands' => $strands]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $id = decrypt($id);

        $section = Section::findorfail($id);
        $section->active = 0;
        
        if($section->save()) {
            $action = 'Removed Section';
            AuditTrailController::create($action);
        }


    }



    /**
     * all sections
     */
    public function allSections()
    {
        $data = array(
            'name' => null,
            'grade_level' => null,
            'action' => null
        );

        $sections = Section::where('active', 1)->orderBy('grade_level', 'asc')->get();

        if(count($sections) > 0) {

            $data = null;

            foreach($sections as $s) {
                $data[] = [
                    'name' => $s->name,
                    'grade_level' => 'Grade ' . $s->grade_level,
                    'enrolled' => $s->enrolled,
                    'limit' => $s->student_limit,
                    'strand' => $this->core->getStrandCode($s->strand_id),
                    'action' => "<a href='" . route('admi.update.section', ['id' => encrypt($s->id)]) . "' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Update</a> <button class='btn btn-danger btn-xs' onclick=\"removeSection('" . encrypt($s->id) . "')\"><i class='fa fa-trash'></i> Remove</button>"
                ];
            }
        }

        return $data;
    }
}
