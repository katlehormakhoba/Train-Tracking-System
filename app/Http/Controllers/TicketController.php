<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Station;
use App\Train;
use App\Passenger;
use App\Price;
use App\Card;

use Auth;

class TicketController extends Controller
{
    private $centurion = "Centurion";
    private $johannesburg = "Johannesburg";
    private $pretoria = "Pretoria";
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = null;
        
        if (Auth::user()->role->name == "ROLE_ADMIN") {
            $tickets = Ticket::all();
        }else {
            $userId = Auth::user()->userId;
            $passenger = Passenger::where("userId", $userId)->first();
            $tickets = Ticket::where("passengerId", $passenger->passengerId)->get();
        }
        
        return view("tickets.index", ["tickets" => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all();
        $trains = Train::all();
        $userId = Auth::user()->userId;
        $prices = Price::all();
        $trains = Train::where("isAvailable", "Available")->get();
        $passenger = Passenger::where("userId", $userId)->first();
        $cards = Card::where("passengerId", $passenger->passengerId)->get();
        return view("tickets.create", ["stations" => $stations, 
        "cards"=>$cards,
        "trains"=>$trains, "prices"=>$prices ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "trainNumber"=> "required",
            "trip" => "required",
            "bankCard"=>"required"
        ]);
        $ticket = new Ticket;
        $email = Auth::user()->email;
        $card = Card::where("cardNumber", $request->bankCard)->first();
        $price = Price::where("priceId", $request->trip)->first();
        $train = Train::where("trainNumber", $request->trainNumber)->first();

        $userId = Auth::user()->userId;

        $passenger = Passenger::where("userId", $userId)->first();

        if (!Passenger::where("passengerId", $passenger->passengerId)->first()) {
            return redirect()->back()->with("error", "Passenger not found");
        }

        if ($train->currentLoad > $train->maximumLoad) {
            return redirect()->back()->with("error", "Train $train->trainNumber is full.");
        }

        $train->currentLoad = $train->currentLoad + 1;
        $train->update();

        $ticket->passengerId = $passenger->passengerId;
        $ticket->trip = $price->from." - ".$price->destination;
        $ticket->trainId = $train->trainId;
        $ticket->price = $price->price;

        $card->balance = $card->balance - $ticket->price;
        $card->update();

        $ticket->save();
        return redirect()->route("tickets")->with("success", "Ticket created successsfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Ticket::where("roleId", $id)->first()) {
            return redirect()->route("tickets")->with("error", "Ticket not found!");
        }
        $ticket = Ticket::where("roleId", $id)->first();
        $stations = Station::all();
        $trains = Train::all();

        return view("tickets.edit", ["ticket"=>$ticket,
            "stations"=>$stations, "trains"=>$trains
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "train" => "required",
            "destination" => "required",
            "from"=>"required"
        ]);
        $ticket = Ticket::where("roleId", $id)->first();
        $email = Auth::user()->email;

        $ticket->train_id = $request->train;
        $ticket->destination = $request->destination;
        $ticket->from = $request->from;

        $ticket->update();
        return redirect()->route("tickets")->with("success", "Ticket updated successsfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Ticket::where("roleId", $id)->first()) {
            return redirect()->route("tickets")->with("error", "Ticket not found!");
        }
        $ticket = Ticket::where("roleId", $id)->first();
        $ticket->delete();
        return redirect()->route("tickets")->with("success", "Ticket deleted successsfully!");
    }

    public function unbook($id)
    {
        if (!Ticket::where("ticketId", $id)->first()) {
            return redirect()->route("tickets")->with("error", "Ticket not found!");
        }
        $ticket = Ticket::where("ticketId", $id)->first();
        $ticket->isBooked = false;
        $train = Train::where("trainId", $ticket->trainId)->first();
        $train->currentLoad = $train->currentLoad - 1;
        $ticket->update();
        return redirect()->route("tickets")->with("success", "Ticket deleted successsfully!");
    }

    public function rebook($id)
    {
        if (!Ticket::where("ticketId", $id)->first()) {
            return redirect()->route("tickets")->with("error", "Ticket not found!");
        }
        $ticket = Ticket::where("ticketId", $id)->first();
        $ticket->isBooked = true;
        $train = Train::where("trainId", $ticket->trainId)->first();
        $train->currentLoad = $train->currentLoad + 1;
        $ticket->update();
        return redirect()->route("tickets")->with("success", "Ticket deleted successsfully!");
    }
}
