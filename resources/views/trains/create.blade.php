@extends('layouts.admin.base')


@section('content')
<div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <div>
            <h3 class="text-primary">
                Add Train
            </h3>
        </div>
    </div>
        <div class="col-md-7 align-center">
            <div class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route("trains")}}">Back</a>
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
                        <div class="text-center text-muted mb-4">
                            <h3>{{ __('Create Train') }}</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('saveTrain') }}">
                            @csrf()
                            
                            <!-- first name and last name -->
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('trainNumber') ? ' has-danger' : '' }}">
                                            <label for="description">
                                                <b>Train Number
                                                        <span class="text-danger">*</span>
                                                </b>
                                            </label>
                                            <div class="input-group input-group-alternative mb-3">
                                                <input class="form-control{{ $errors->has('trainNumber') ? ' is-invalid' : '' }}" type="text" name="trainNumber" value="{{ old('trainNumber') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('trainNumber'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('trainNumber') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('isAvailable') ? ' has-danger' : '' }}">
                                            <label for="isAvailable">
                                                    <b>Availability
                                                            <span class="text-danger">*</span>
                                                    </b>
                                            </label>
                                        <div class="input-group input-group-alternative mb-3">
                                
                                            <select class="form-control{{ $errors->has('isAvailable') ? ' is-invalid' : '' }}" name="isAvailable">
                                                
                                                <option value="Not available">Not available</option>
                                                <option value="Available">Available</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('isAvailable'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('isAvailable') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('departureTime') ? ' has-danger' : '' }}">
                                            <label for="description">
                                                <b>Departure Time
                                                        <span class="text-danger">*</span>
                                                </b>
                                            </label>
    
                                            <div class="input-group input-group-alternative mb-3">
                                                <select name="departureTime" class="form-control{{ $errors->has('departureTime') ? ' is-invalid' : '' }}" >
                                                    <option value="06:00">06:00</option>
                                                    <option value="07:00">07:00</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="20:00">20:00</option>
                                                </select>
                                            </div>
                                            @if ($errors->has('departureTime'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('departureTime') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                        </div>

                            <!-- first name and last name -->


                            <!-- first name and last name -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                        <label for="description">
                                            <b>Location
                                                    <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <div class="input-group input-group-alternative mb-3">
                                            <input class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" type="text" name="location" value="{{ old('location') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('location'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('maximumLoad') ? ' has-danger' : '' }}">
                                            <label for="description">
                                                <b>Maximum Loard
                                                    <span class="text-danger">*</span>
                                                </b>
                                            </label>
                                            <div class="input-group input-group-alternative mb-3">
                                                <input class="form-control{{ $errors->has('maximumLoad') ? ' is-invalid' : '' }}" type="text" name="maximumLoad" value="{{ old('maximumLoad') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('maximumLoad'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('maximumLoad') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            </div>
    
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Add Train') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
