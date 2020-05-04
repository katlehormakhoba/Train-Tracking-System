<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Passenger;
use Auth;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware("auth");
     }
    public function index()
    {
        if (Auth::user()->role->name != "ROLE_PASSENGER") {
            return redirect()->back()->with("error","You're not allowed to perform this action!");
        }
        $userId = Auth::user()->userId;
        $passenger = Passenger::where("userId",$userId)->first();
        $cards = Card::where("cardId", $passenger->passengerId)->get();
        return view("cards.index", ["cards" => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role->name != "ROLE_PASSENGER") {
            return redirect()->back()->with("error", "You're not allowed to perform this action!");
        }

        return view("cards.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role->name != "ROLE_PASSENGER") {
            return redirect()->back()->with("error", "You're not allowed to perform this action!");
        }

        $this->validate(
            $request,
            [
                "bankName" => "required",
                "cardOwner" => "required",
                "cardNumber" => "required|min:16|max:16",
            ]);

            $userId = Auth::user()->userId;
            $passenger = Passenger::where("userId", $userId)->first();

            $card = new Card;
            $card->bankName = $request->bankName;
            $card->cardOwner = $request->cardOwner;
            $card->cardNumber = $request->cardNumber;
            $card->passengerId = $passenger->passengerId;
            $card->balance = rand(200, 500);
            

            $card->save();

            return redirect()->route("cards")->with("success", "Card saved successfully!");
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
        if (Auth::user()->role->name != "ROLE_PASSENGER") {
            return redirect()->back()->with("error", "You're not allowed to perform this action!");
        }

        $card = Card::where("cardId", $id)->first();

        return view("cards.edit", ["card"=>$card]);

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
        if (Auth::user()->role->name != "ROLE_PASSENGER") {
            return redirect()->back()->with("error", "You're not allowed to perform this action!");
        }

        $this->validate(
            $request,
            [
                "bankName" => "required",
                "cardOwner" => "required",
                "cardNumber" => "required|min:16|max:16",
            ]);

            $card = Card::where("cardId", $id)->first();
            $card->bankName = $request->bankName;
            $card->cardOwner = $request->cardOwner;
            $card->cardNumber = $request->cardNumber;
            

            $card->update();

            return redirect()->route("cards")->with("success", "Card saved successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role->name != "ROLE_PASSENGER") {
            return redirect()->back()->with("error", "You're not allowed to perform this action!");
        }

        if (!Card::where("cardId", $id)->first()) {
            return redirect()->back()->with("error", "Card not found!");
        }

        $card = Card::where("cardId", $id)->first();
        $card->delete();
        return redirect()->route("cards")->with("success", "Card deleted successfully!");
    }
}
