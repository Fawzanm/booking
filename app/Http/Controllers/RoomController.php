<?php

namespace App\Http\Controllers;

use App\Room;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Room[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return ['rooms' => Room::all()];
    }

    public function available(Request $request)
    {
        $from = (new DateTime($request->input('check_in')))->format('Y-m-d');
        $to = (new DateTime($request->input('check_out')))->format('Y-m-d');

        $query = "SELECT *
                    FROM rooms WHERE id NOT IN (
                        SELECT DISTINCT room_id FROM bookings
                            WHERE check_in >= '$from' AND check_out <= '$to'
                            )";

        Log::debug($query);

        return DB::select($query);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Room
     */
    public function create(Request $request)
    {
        Room::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'price' => $request->input('price'),
            'capacity' => $request->input('capacity'),
            'user_id' => Auth::user()->id
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
