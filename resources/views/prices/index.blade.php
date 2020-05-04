@extends('layouts.admin.base')

@section("content")
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <div>
            <h3 class="text-primary">
                Prices
            </h3>
        </div>
    </div>
    <div class="col-md-7 align-center">
            <div class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </li>
                @if (Auth::user()->role->name == "ROLE_ADMIN")
                    <li class="breadcrumb-item">
                        <a href="{{route("createPrice")}}">Add Price</a>
                    </li>                    
                @endif
            </div>
        </div>
    </div>
    <div class="container">
            @include('layouts.messages.message')
        </div>
    <div class="container">
            
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><b>From</b></th>
                                    <th><b>Destination</b></th>
                                    <th><b>Price</b></th>
                                    @if (Auth::user()->role->name == "ROLE_ADMIN")
                                        <th><b>Action</b></th>                                        
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($prices as $price)
                                    <tr>
                                        <td>{{$price->from}}</td>
                                        <td>{{$price->destination}}</td>
                                        <td>R{{$price->price}}</td>
                                        @if (Auth::user()->role->name == "ROLE_ADMIN")
                                            <td>
                                                <form action="{{route('deletePrice', $price->priceId)}}" method="POST">
                                                    @csrf
                                                    <a class="btn btn-sm btn-primary" href="{{route('editPrice', $price->priceId)}}">Edit</a>
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this price: R{{$price->price}}?');">Delete</button>
                                                </form>
                                            </td>                                            
                                        @endif
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
    </div>
@endsection