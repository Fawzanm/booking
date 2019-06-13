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

    public function fetch()
    {
        return ['room' => Room::findOrFail(request('id'))];
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
     * @return array
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


        return ['message' => 'Your room has been added successfully.'];
    }


}
