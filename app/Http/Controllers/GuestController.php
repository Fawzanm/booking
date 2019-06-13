<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Room;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

        return view('booking', ['room' => $room]);
    }

    public function admin_booking(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);


        $users = User::all();
        $rooms = Room::all();
        return view('admin_booking', ['users' => $users, 'rooms'=>$rooms]);
    }


    public function save(Request $requet)
    {
        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'room_id' => request('room_id'),
            'check_in' => request('check_in'),
            'check_out' => request('check_out'),
            'no_adults' => request('no_adults'),
            'price' => request('price'),
            'comments' => request('comments'),
        ]);

        return ['message' => 'Your booking has been confirmed successfully.'];
    }
}
