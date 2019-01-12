<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\AuditTrailController;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rooms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.room-add-edit', ['room' => null]);
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
            'name' => 'required'
        ]);

        $name = $request['name'];
        $description = $request['description'];
        $room_id = $request['room_id'];

        if($room_id == null) {
            // add
            $room = new Room();

            $action = 'Created New Room';
        }
        else {
            // update
            $room = Room::findorfail($room_id);

            $action = 'Updated Room';

        }

        $room->name = $name;
        $room->description = $description;

        if($room->save()) {
            // add to audit trail
            AuditTrailController::create($action);
            return redirect()->route('admin.room.add')->with('success', $action);

        }

        return redirect()->back()->with('error', 'Error Occured! Please Try Again Later!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $id = $this->core->decryptString($id);

        $room = Room::findorfail($id);

        return view('admin.room-add-edit', ['room' => $room]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $room = Room::findorfail($id);

        $room->active = 0;

        $room->save();

        AuditTrailController::create('Removed Room');
    }




    /**
     * @return all rooms in json format
     */
    public function allRooms()
    {
        $rooms = Room::where('active', 1)->orderBy('name', 'asc')->get();

        $data = [
            'name' => null,
            'description' => null,
            'action' => null,
        ];

        if(count($rooms) > 0) {
            $data = null;

            foreach($rooms as $s) {
                $data[] = [
                    'name' => $s->name,
                    'description' => $s->description,
                    'action' => "<a href=\"" . route('admin.room.update', ['id' => encrypt($s->id)]) . "\" class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Update</a> <button class='btn btn-danger btn-xs' onclick=\"removeRoom('" . $s->id . "')\"><i class='fa fa-trash'></i> Remove</button>"
                ];
            }
        }

        return $data;
    }
}
