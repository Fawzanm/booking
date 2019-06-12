@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Room</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Luxury Room">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="capacity">Capacity</label>
                                    <input type="number" class="form-control" id="capacity"
                                           placeholder="2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description"
                                       placeholder="Fully furnished luxury room">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="type">Type</label>
                                    <select type="text" class="form-control" id="type">
                                        <option value="apartment">Apartment</option>
                                        <option value="studio">Studio</option>
                                        <option value="room">Room</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="price">Price/Day(AED)</label>
                                    <input type="number" class="form-control" id="price" placeholder="100">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                            <button class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
