@extends('layouts.home.base')


@section('content')

    <div class="container mt-8 pb-5 mt-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-md-8 mx-auto">
                <div class="card bg-white shadow border-0">
                    <div class="card-body">
                        <div class="text-center text-muted mb-4">
                            <h3>{{ __('SIGN IN PASENGER') }}</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf()
                            
                        
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email Address') }}" type="text" name="email" value="{{ old('email') }}"  autofocus>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" >
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Sign in') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

