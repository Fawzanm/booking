@extends('layouts.customer')

@section('content')
    <div class="container" id="room" xmlns:v-on="http://www.w3.org/1999/xhtml"
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
                                    <label for="name">Check In</label>
                                    <input type="date" class="form-control" id="from" placeholder="2019/01/01"
                                           value="{{request('check_in')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Check Out</label>
                                    <input type="date" class="form-control" id="from" placeholder="2019/01/01"
                                           value="{{ request('check_out') }}">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="capacity">Capacity</label>
                                    <input type="text" class="form-control" id="capacity"
                                           placeholder="2" v-model="capacity">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Comments</label>
                                <input type="text" class="form-control" id="description"
                                       placeholder="Fully furnished luxury room" v-model="description">
                            </div>

                            <div class="form-group">
                                <label for="description">Total Payment</label>
                                <input type="text" class="form-control" id="pay"
                                        disabled>
                            </div>


                            <button class="btn btn-primary" @click="saveForm">Pay</button>
                            <button class="btn btn-danger" @click="resetForm">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

