@extends('layouts.admin.base')

@section("content")
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <div>
            <h3 class="text-primary">
                Passengers
            </h3>
        </div>
    </div>
    <div class="col-md-7 align-center">
            <div class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </li>
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
                            @forelse ($passengers as $passenger)
                                <tr>
                                    <td>{{$passenger->name}}</td>
                                    <td>
                                    <form action="{{route('deletePassenger', $passenger->passengerId)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this passenger: {{$passenger->name}}?');">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="3">No passengers!</td> 
                            @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                    
                    @else
                        <b>Stations</b>
                        <hr>
                        @forelse ($stations as $station)
                            <p>{{$station->name}} station</p>
                        @empty
                            No station
                        @endforelse

                    @endif

                </div>
            </div>
    </div>
@endsection
