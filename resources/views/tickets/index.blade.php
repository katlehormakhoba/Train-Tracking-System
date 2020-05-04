@extends('layouts.admin.base')

@section("content")
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <div>
                <h3 class="text-primary">
                    Tickets
                </h3>
            </div>
        </div>
        <div class="col-md-7 align-center">
                <div class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">Home</a>
                    </li>
                    @if (Auth::user()->role->name == "ROLE_PASSENGER")
                        <li class="breadcrumb-item">
                            <a href="{{route("createTicket")}}">Book Ticket</a>
                        </li>                        
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
                @include('layouts.messages.message')
            </div>
    <div class="container">
        @if (Auth::user()->role->name != "ROLE_ADMIN")
        @endif
            
            <div class="card mb-3">
                <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><b>Trip</b></th>
                                    <th><b>Price</b></th>
                                    <th><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{$ticket->trip}}</td>
                                        <td>{{$ticket->price}}</td>
                                        <td>
                                        <form action="{{route('unbookTicket', $ticket->ticketId)}}" method="POST">
                                            @csrf
                                            @if ($ticket->isBooked)
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to unbook this ticket: {{$ticket->trip}}?');">Unbook</button>
                                            @else 
                                        <a class="btn btn-sm btn-success" href="{{route("rebookTicket", $ticket->ticketId)}}" onclick="return confirm('Are you sure you want to rebook this ticket: {{$ticket->trip}}?');">Rebook</a>
                                            @endif
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
    </div>
@endsection