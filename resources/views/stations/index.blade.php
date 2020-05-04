@extends('layouts.admin.base')

@section("content")
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <div>
            <h3 class="text-primary">
                Stations
            </h3>
        </div>
    </div>
    <div class="col-md-7 align-center">
            <div class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </li>
                @if (Auth::user()->role->name == "ROLE_ADMIN")
                    <li class="breadcrumb-item">
                        <a href="{{route("createStation")}}">Add Station</a>
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

                    @if (Auth::user()->role->name == "ROLE_ADMIN")
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><b>Name</b></th>
                                    <th><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($stations as $station)
                                    <tr>
                                        <td>{{$station->name}} station</td>
                                        <td>
                                        <form action="{{route('deleteStation', $station->stationId)}}" method="POST">
                                            @csrf
                                            <a class="btn btn-sm btn-primary" href="{{route('editStation', $station->stationId)}}">Edit</a>
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this station: {{$station->name}}?');">Delete</button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    
                    @else
                        <b>Stations</b>
                        <hr>
                        @forelse ($stations as $station)
                            <p>
                                <span class="text-danger">
                                    <i class="fa fa-circle"></i>
                                </span>
                                {{$station->name}} station <hr>
                            </p>
                        @empty
                            No station
                        @endforelse

                    @endif

                </div>
            </div>
    </div>
@endsection