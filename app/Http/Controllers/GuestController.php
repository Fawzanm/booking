<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('welcome', ['rooms' => Room::all()]);
    }

    public function booking(Request $request)
    {
        $room = Room::findOrFail($request->input('id'));
        return view('booking', ['room' => $room]);
    }
}
