<?php

namespace App\Http\Controllers;

use App\Room;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GuestController extends Controller
{
    public function index()
    {
        return view('welcome', ['rooms' => Room::all()]);
    }

    public function booking(Request $request)
    {
        if (!$request->input('check_in') || !$request->input('check_out') || !$request->input('id')) {
            return redirect('/');
        }

        $room = Room::findOrFail($request->input('id'));

        $from = Carbon::parse($request->input('check_in'));
        $to = Carbon::parse($request->input('check_out'));

        Log::debug($from);
        Log::debug($to);

        return view('booking', ['room' => $room]);
    }
}
