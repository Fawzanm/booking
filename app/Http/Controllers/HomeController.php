<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

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

        $request->user()->authorizeRoles(['admin']);
        return view('bookings');

    }

    public function add_room(Request $request)
    {

        $request->user()->authorizeRoles(['admin']);
        return view('add_room');

    }
}
