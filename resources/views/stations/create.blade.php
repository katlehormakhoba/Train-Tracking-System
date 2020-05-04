@extends('layouts.admin.base')


@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <div>
            <h3 class="text-primary">
                Create Station
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
                        <div class="text-center text-muted mb-4">
                            <h3>{{ __('Create Station') }}</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('saveStation') }}">
                            @csrf()
                            
                            <!-- first name and last name -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label for="description">
                                            <b>Station
                                                <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <div class="input-group input-group-alternative mb-3">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Create Station') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
