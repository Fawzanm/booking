@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Bookings</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <table class="table" id="bookings">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Room</th>
                                <th scope="col">User</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col"># People</th>
                                <th scope="col">Comments</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <th scope="row">{{$booking->id}}</th>
                                    <td>{{$booking->room->name}}</td>
                                    <td>{{$booking->user->email}}</td>
                                    <td>{{$booking->check_in}}</td>
                                    <td>{{$booking->check_out}}</td>
                                    <td>{{$booking->no_adults}}</td>
                                    <td>{{$booking->comments}}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
