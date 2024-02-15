<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::get();
        return view('room.list',['room'=>$rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cname'     => 'required'
        ]);
        $room = new Room();
        $room->cname   = $request->cname;
        $result = $room->save();
        if ($result) {
            return redirect(route('room.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('room.index'))->with('error', 'Failure');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rooms = Room::where('id',$id)->first();
        return view('room.view',['room'=>$rooms]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rooms = Room::where('id',$id)->first();
        return view('room.edit',['room'=>$rooms]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cname'     => 'required'
        ]);
        $room = Room::findOrFail($id);
        $room->cname = $request->input('cname');
        $result = $room->save();
        if ($result) {
            return redirect(route('room.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('room.index'))->with('error', 'Failure');
        }
       
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Room::findOrFail($id)->delete(); // temporary delete
        // Room::findOrFail($id)->forceDelete(); // permanent delete
        if ($result) {
            return redirect(route('room.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('room.index'))->with('error', 'Failure');
        }
    }
}
