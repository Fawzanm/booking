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

        $from = Carbon::parse($request->input('check_in'))->format('Y/m/d');
        $to = Carbon::parse($request->input('check_out'))->format('Y/m/d');

        return view('booking', ['room' => $room, 'check_in' => $from, 'check_out' => $to]);
    }

    public function admin_booking(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);


        $users = User::all();
        $rooms = Room::all();
        return view('admin_booking', ['users' => $users, 'rooms' => $rooms]);
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


    public function fetchTotal(Request $request)
    {

        $room = Room::find(request('room_id'));

        $from = (new DateTime($request->input('check_in')))->format('Y-m-d');
        $to = (new DateTime($request->input('check_out')))->format('Y-m-d');

        // Calulating the difference in timestamps
        $diff = strtotime($from) - strtotime($to);

        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return ['price' => abs(round($diff / 86400)) * $room->price];

    }

    public function admin_booking_save(Request $request)
    {
        $from = (new DateTime($request->input('check_in')))->format('Y-m-d');
        $to = (new DateTime($request->input('check_out')))->format('Y-m-d');

        $booking = Booking::create([
            'user_id' => request('user_id'),
            'room_id' => request('room_id'),
            'check_in' => $from,
            'check_out' => $to,
            'no_adults' => request('no_adults'),
            'price' => request('price'),
            'comments' => request('comments'),
        ]);

        return ['message' => 'Your booking has been confirmed successfully.'];
    }
}
