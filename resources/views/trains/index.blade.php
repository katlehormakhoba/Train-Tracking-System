@extends('layouts.admin.base')

@section("content")
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <div>
                <h3 class="text-primary">
                    Trains
                </h3>
            </div>
        </div>
        <div class="col-md-7 align-center">
                <div class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">Home</a>
                    </li>
                    @if (Auth::user()->role->name == "ROLE_ADMIN")
                        <li class="breadcrumb-item">
                            <a href="{{route("createTrain")}}">Add Train</a>
                        </li>                        
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
                @include('layouts.messages.message')
            </div>
    <div class="container">
        @if (Auth::user()->role->name == "ROLE_ADMIN")
        @endif           
            <div class="card mb-3">
                <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><b>Train Number</b></th>
                                    <th><b>Current Load</b></th>
                                    <th><b>Maximum Load</b></th>
                                    <th><b>Availability</b></th>
                                    <th><b>Departure Time</b></th>
                                    <th><b>Location</b></th>
                                    @if (Auth::user()->role->name == 'ROLE_ADMIN')
                                        <th><b>Action</b></th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($trains as $train)
                                    <tr>
                                        <td>{{$train->trainNumber}}</td>
                                        <td>{{$train->currentLoad}}</td>
                                        <td>{{$train->maximumLoad}}</td>
                                        <td>{{$train->isAvailable}}</td>
                                        <td>{{$train->departureTime}}</td>
                                        <td>{{$train->location}} station</td>
                                        @if (Auth::user()->role->name == 'ROLE_ADMIN')
                                        <td>
                                            <form action="{{route('deleteTrain', $train->trainId)}}" method="POST">
                                                 @csrf
                                                <a class="btn btn-sm btn-primary" href="{{route('editTrain', $train->trainId)}}">Edit</a>
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this train: {{$train->trainNumber}}?');">Delete</button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
    </div>
@endsection