@extends('layouts.admin.base')


@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <div>
            <h3 class="text-primary">
                Edit Price
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
                        <form role="form" method="POST" action="{{ route('updatePrice', $price->priceId) }}">
                            @csrf()
                            
                            <!-- first name and last name -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('from') ? ' has-danger' : '' }}">
                                        <label for="description">
                                            <b>From
                                                <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <div class="input-group input-group-alternative mb-3">
                                            <select class="form-control{{ $errors->has('from') ? ' is-invalid' : '' }}" name="from">
                                                    <option value="{{$price->from}}">{{$price->from}}</option>
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
                                <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('destination') ? ' has-danger' : '' }}">
                                                <label for="description">
                                                    <b>Destination
                                                        <span class="text-danger">*</span>
                                                    </b>
                                                </label>
                                                <div class="input-group input-group-alternative mb-3">
                                                    <select class="form-control{{ $errors->has('destination') ? ' is-invalid' : '' }}" name="destination">
                                                        <option value="{{$price->destination}}">{{$price->destination}}</option>
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

                            <!-- first name and last name -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                        <label for="description">
                                            <b>Price
                                                <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <div class="input-group input-group-alternative mb-3">
                                            <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" type="text" name="price" value="{{ $price->price }}" required autofocus>
                                        </div>
                                        @if ($errors->has('price'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Update Price') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
