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
                        <a href="{{route("dashboard")}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route("tickets")}}">Back</a>
                    </li>
                </div>
            </div>
        </div>

<div class="container">
        @include('layouts.messages.message')
    </div>
<div class="container mt-4 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-white shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" method="POST" action="{{ route('saveTicket') }}">
                            @csrf()
                            

                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('bankCard') ? ' has-danger' : '' }}">
                                                <label for="bankCard">
                                                        <b>Bank Card</b>
                                                </label>
                                            <div class="input-group input-group-alternative mb-3">
                                    
                                                <select class="form-control{{ $errors->has('bankCard') ? ' is-invalid' : '' }}" name="bankCard">
                                                    @foreach ($cards as $card)
                                                        <option value="{{$card->cardNumber}}">{{$card->bankName}} - {{$card->cardNumber}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('bankCard'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('bankCard') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                            <div class="form-group{{ $errors->has('trainNumber') ? ' has-danger' : '' }}">
                                                    <label for="trainNumber">
                                                            <b>Train Number</b>
                                                    </label>
                                                <div class="input-group input-group-alternative mb-3">
                                        
                                                    <select class="form-control{{ $errors->has('trainNumber') ? ' is-invalid' : '' }}" name="trainNumber" id="">
                                                        @foreach ($trains as $train)
                                                    <option value="{{$train->trainNumber}}">{{$train->trainNumber}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('trainNumber'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('trainNumber') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    <div class="col-sm-12">
                                            <div class="form-group{{ $errors->has('trip') ? ' has-danger' : '' }}">
                                                    <label for="trip">
                                                            <b>Trip</b>
                                                    </label>
                                                <div class="input-group input-group-alternative mb-3">
                                        
                                                    <select class="form-control{{ $errors->has('trip') ? ' is-invalid' : '' }}" name="trip" id="">
                                                        @foreach ($prices as $price)
                                                    <option value="{{$price->priceId}}">{{$price->from}} - {{$price->destination}}, R{{$price->price}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('trip'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('trip') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                            </div>
    
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Book a ticket') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
