@extends('layouts.admin.base')

@section("content")
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <div>
                <h3 class="text-primary">
                    Ticket Edit
                </h3>
            </div>
        </div>
        <div class="col-md-7 align-center">
                <div class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route("tickets")}}">Tickets</a>
                    </li>  
                </div>
            </div>
        </div>
        <div class="container">
                @include('layouts.messages.message')
            </div>
<div class="container mt-4">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-white shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h3>{{ __('Book Ticket') }}</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('updateTicket', $ticket->id) }}">
                            @csrf()
                            

                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('train') ? ' has-danger' : '' }}">
                                                <label for="train">
                                                        <b>Train</b>
                                                </label>
                                            <div class="input-group input-group-alternative mb-3">
                                    
                                                <select class="form-control{{ $errors->has('train') ? ' is-invalid' : '' }}" name="train">
                                                    <option value="{{$ticket->train->id}}">{{$ticket->train->name}}</option>
                                                    @foreach ($trains as $train)
                                                        @if ($ticket->train->name != $train->name)
                                                            <option value="{{$train->id}}">{{$train->name}}</option>
                                                        @endif
            
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('train'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('train') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            </div>

                            <!-- first name and last name -->
                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('from') ? ' has-danger' : '' }}">
                                                <label for="from">
                                                        <b>From</b>
                                                </label>
                                            <div class="input-group input-group-alternative mb-3">
                                    
                                                <select class="form-control{{ $errors->has('from') ? ' is-invalid' : '' }}" name="from" id="">
                                                    <option value="{{$ticket->from}}">{{$ticket->from}}</option>
                                                    @foreach ($stations as $station)
                                                        <option value="{{$station->name}}">{{$station->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('from'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('from') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('destination') ? ' has-danger' : '' }}">
                                                <label for="destination">
                                                        <b>Destination</b>
                                                </label>
                                            <div class="input-group input-group-alternative mb-3">
                                    
                                                <select class="form-control{{ $errors->has('destination') ? ' is-invalid' : '' }}" name="destination" id="">
                                                    <option value="{{$ticket->destination}}">{{$ticket->destination}}</option>
                                                    @foreach ($stations as $station)
                                                        <option value="{{$station->name}}">{{$station->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('destination'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('destination') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            </div>
    
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Update Ticket') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
