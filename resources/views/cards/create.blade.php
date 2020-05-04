@extends('layouts.admin.base')


@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <div>
            <h3 class="text-primary">
                Add Bank Card
            </h3>
        </div>
    </div>
    <div class="col-md-7 align-center">
            <div class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route("dashboard")}}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route("stations")}}">Back</a>
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
                        <form role="form" method="POST" action="{{ route('saveCard') }}">
                            @csrf()
                            
                            <!-- first name and last name -->
                            <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('bankName') ? ' has-danger' : '' }}">
                                                <label for="description">
                                                    <b>Bank Name
                                                        <span class="text-danger">*</span>
                                                    </b>
                                                </label>
                                                <div class="input-group input-group-alternative mb-3">
                                                    <select class="form-control{{ $errors->has('bankName') ? ' is-invalid' : '' }}" name="bankName">
                                                        <option value="CAPITEC">CAPITEC</option>
                                                        <option value="FNB">FNB</option>
                                                        <option value="NEDBANK">NEDBANK</option>
                                                        <option value="ABSA">ABSA</option>
                                                        <option value="STANDARD BANK">STANDARD BANK</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('bankName'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('bankName') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('cardOwner') ? ' has-danger' : '' }}">
                                        <label for="description">
                                            <b>Card Owner
                                                <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <div class="input-group input-group-alternative mb-3">
                                            <input class="form-control{{ $errors->has('cardOwner') ? ' is-invalid' : '' }}" type="text" name="cardOwner" value="{{ old('cardOwner') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('cardOwner'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('cardOwner') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('cardNumber') ? ' has-danger' : '' }}">
                                            <label for="description">
                                                <b>Card Number
                                                     <span class="text-danger">*</span>
                                                </b>
                                            </label>
                                            <div class="input-group input-group-alternative mb-3">
                                                <input class="form-control{{ $errors->has('cardNumber') ? ' is-invalid' : '' }}" type="text" name="cardNumber" value="{{ old('cardNumber') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('cardNumber'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('cardNumber') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
    
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Add Card') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
