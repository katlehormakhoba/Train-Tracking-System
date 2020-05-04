<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Train;
use App\Ticket;
use App\Station;
use App\Passenger;
use App\Card;
use App\Price;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {

        if (!Auth::check()) {
            return redirect()->route("login")->with("error" ,"Please login!");
        }

        $trains = Train::all();
        $tickets = Ticket::all();
        $stations = Station::all();
        $passengers = Passenger::all();
        $cards = Card::all();
        $prices = Price::all();

        return view("dashboard.index",[
            "trains" => $trains,
            "tickets" => $tickets,
            "stations" => $stations,
            "passengers" => $passengers,
            "cards" => $cards,
            "prices" => $prices
        ]);
    }
}
