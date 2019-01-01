<?php

namespace App\Http\Controllers;

use App\Strand;
use Illuminate\Http\Request;

class StrandController extends Controller
{
    // STRANDS
    public function index()
    {
    	return view('admin.strands');
    }


    // STRAND CREATE
    public function create()
    {
    	return view('admin.strand-add-edit', ['strand' => null]);
    }


    // STRAND STORE add and update
    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required',
    		'code' => 'required',
    		'track' => 'required'
    	]);

    	$name = $request['name'];
    	$code = $request['code'];
    	$track = $request['track'];

    	$strand_id = $request['strand_id'];

    	if($strand_id == null) {
    		// create strand
    		$strand = new Strand();

    		$action = 'Added New Strand';
    		$message = 'Added New Strand';
    	}
    	else {
    		// update strand
    		$strand = Strand::findorfail($strand_id);

    		$action = 'Updated Strand';
    		$message = 'Updated Strand';
    	}

    	$strand->name = $name;
    	$strand->code = $code;
    	$strand->track = $track;

    	if($strand->save()) {
    		return redirect()->route('admin.add.strand')->with('success', $message);

    	}

    	return redirect()->route('admin.add.strand')->with('error', 'Error Occurred. Please Try Again!');

    }



    // STRAND UPDATE
    public function update($id)
    {
    	$id = $this->core->decryptString($id);

    	$strand = Strand::findorfail($id);

    	return view('admin.strand-add-edit', ['strand' => $strand]);
    }




    // STRAND REMOVE
    public function remove($id)
    {
    	$id = decrypt($id);

        $strand = Strand::findorfail($id);
        $strand->active = 0;

        if($strand->save()) {
            $action = 'Strand Removed';
            AuditTrailController::create($action);
        }
    }




    // ALL STRANDS TO DATA TABLE
    public function allStrands()
    {
    	$data = array(
    		'name' => null,
    		'code' => null,
    		'track_code' => null,
    		'action' => null
    	);

    	// fetch all active strands
    	$strands = Strand::where('active', 1)->orderBy('name', 'asc')->get();

    	if(count($strands) > 0) {
    		$data = null;

    		foreach($strands as $s) {
    			$data[] = [
    				'name' => $s->name,
    				'code' => $s->code,
    				'track' => $s->track,
    				'action' => "<a href='" . route('admin.update.strand', ['id' => encrypt($s->id)]) . "' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Update</a> <button class='btn btn-danger btn-xs' onclick=\"removeStrand('" . encrypt($s->id) . "')\"><i class='fa fa-trash'></i> Remove</button>"
    			];
    		}
    	}

    	return $data;
    }
}
