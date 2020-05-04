@extends('layouts.admin.base')

@section("content")
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <div>
            <h3 class="text-primary">
                Cards
            </h3>
        </div>
    </div>
    <div class="col-md-7 align-center">
            <div class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route("createCard")}}">Add Card</a>
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
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><b>Bank Name</b></th>
                                    <th><b>Card Number</b></th>
                                    <th><b>Card Owner</b></th>
                                    <th><b>Balance(ZAR)</b></th>
                                    <th><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cards as $card)
                                    <tr>
                                        <td>{{$card->bankName}}</td>
                                        <td>{{$card->cardNumber}}</td>
                                        <td>{{$card->cardOwner}}</td>
                                        <td>{{$card->balance}}</td>
                                        <td>
                                        <form action="{{route('deleteCard', $card->cardId)}}" method="POST">
                                            @csrf
                                            <a class="btn btn-sm btn-primary" href="{{route('editCard', $card->cardId)}}">Edit</a>
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this card: {{$card->cardNumber}}?');">Delete</button>
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