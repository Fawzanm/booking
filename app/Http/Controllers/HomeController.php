<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        return view('home');
    }


    public function bookings(Request $request)
    {

        $request->user()->authorizeRoles(['admin', 'customer']);


        if (Auth::user()->hasRole('admin')) {
            $bookings = Booking::all();
        } else {
            $bookings = Booking::where('user_id', Auth::user()->id);
        }

        return view('bookings', ['bookings' => $bookings]);

    }

    public function add_room(Request $request)
    {

        $request->user()->authorizeRoles(['admin']);
        return view('add_room');

    }
}
