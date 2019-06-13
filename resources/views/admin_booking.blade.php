@extends('layouts.admin')

@section('content')
    <div class="container" id="admin_booking" xmlns:v-on="http://www.w3.org/1999/xhtml"
         xmlns:v-bind="http://www.w3.org/1999/xhtml">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Make a Reservation</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">User</label>
                                    <select type="date" class="form-control" id="from" v-model="user_id"
                                            v-on:change="user_id = $event.target.value">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->email}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name">Room</label>

                                    <select type="date" class="form-control" id="from" v-model="room_id"
                                            v-on:change="room_id = $event.target.value">
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}">{{$room->name .': '. $room->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Check In</label>
{{--                                    <input type="date" class="form-control" id="from" placeholder="2019/01/01"--}}
{{--                                           value="{{request('check_in')}}" >--}}

                                    <vuejs-datepicker :bootstrap-styling="true" format="yyyy-MM-dd" placeholder="Check Out"
                                                      v-model="check_in"></vuejs-datepicker>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Check Out</label>
{{--                                    <input type="date" class="form-control" id="to"--}}
{{--                                           value="{{ request('check_out') }}" placeholder="2019/01/01">--}}
                                    <vuejs-datepicker :bootstrap-styling="true" format="yyyy-MM-dd" placeholder="Check Out"
                                                      v-model="check_out"></vuejs-datepicker>
                                </div>

                                <input type="hidden" value="{{request('id')}}" id="room_id">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="capacity">No of Adults</label>
                                    <input type="text" class="form-control" id="capacity"
                                           v-model="no_adults">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Comments</label>
                                <input type="text" class="form-control" id="description"
                                       placeholder="" v-model="comments">
                            </div>

                            <div class="form-group">
                                <label for="description">Total Payment</label>
                                <input type="text" class="form-control" id="pay" v-model="pay"
                                       disabled>
                            </div>

                            <div class="form-group">
                                <p for="description" style="color: #2a9055">@{{ status }}</p>
                            </div>


                            <button class="btn btn-primary" @click="saveForm">Update Total</button>
                            <button class="btn btn-primary" @click="saveForm">Book Now</button>
                            <button class="btn btn-danger" @click="resetForm">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

