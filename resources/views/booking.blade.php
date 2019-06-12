@extends('layouts.app')

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
                                    <label for="name">Name</label>
                                    <input type="date" class="form-control" id="from" placeholder=2019/01/01">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="capacity">Capacity</label>
                                    <input type="text" class="form-control" id="capacity"
                                           placeholder="2" v-model="capacity">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description"
                                       placeholder="Fully furnished luxury room" v-model="description">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="type">Type</label>
                                    <select type="text" class="form-control" id="type" v-bind:value="type"
                                            v-on:change="type = $event.target.value">
                                        <option value="apartment">Apartment</option>
                                        <option value="studio">Studio</option>
                                        <option value="room">Room</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="price">Price/Day(AED)</label>
                                    <input type="text" class="form-control" id="price" placeholder="100"
                                           v-model="price">
                                </div>
                            </div>

                            <button class="btn btn-primary" @click="saveForm">Save</button>
                            <button class="btn btn-danger" @click="resetForm">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

