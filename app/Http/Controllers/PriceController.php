<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;
use App\Station;
use Auth;

class PriceController extends Controller
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
        $prices = Price::all();
        return view("prices.index", ["prices"=>$prices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role->name != "ROLE_ADMIN") {
            return redirect()->back()->with("error", "You're not allowed to perform this action!");
        }
        $stations = Station::all();
        return view("prices.create", ["stations"=>$stations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role->name != "ROLE_ADMIN") {
            return redirect()->back()->with("error", "You're not allowed to perform this action!");
        }
        $this->validate(
            $request, [
                "from" => "required",
                "destination" => "required",
                "price" => "required"
            ]);

            if ($request->from == $request->destination) {
                return redirect()->back()->with("error", "from  and destination can't be the same!");
            }

            $price = new Price;
            $price->from = $request->from;
            $price->destination = $request->destination;
            $price->price = $request->price;
            $price->save();
            return redirect()->route("prices")->with("success", "Price added successfully.");
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
        if (Auth::user()->role->name != "ROLE_ADMIN") {
            return redirect()->back()->with("error", "You're not allowed to perform this action!");
        }
        if (!Price::where("priceId",  $id)->first()) {
            return redirect()->back()->with("error", "Price not found!");
        }

        $price = Price::where("priceId",  $id)->first();
        $stations = Station::all();

        return view("prices.edit", ["price" => $price, "stations" => $stations]);
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
        if (Auth::user()->role->name != "ROLE_ADMIN") {
            return redirect()->back()->with("error","You're not allowed to perform this action!");
        }
        $this->validate(
            $request, [
                "from" => "required",
                "destination" => "required",
                "price" => "required"
            ]);

            $price = Price::where("priceId", $id)->first();
            $price->from = $request->from;
            $price->destination = $request->destination;
            $price->price = $request->price;
            $price->update();
            return redirect()->route("prices")->with("success", "Price added successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role->name == "ROLE_ADMIN") {
            return redirect()->back()->with("error", "You're not allowed to perform this action!");
        }
        if (!Price::where("priceId",  $id)->first()) {
            return redirect()->back()->with("error", "Price not found!");
        }

        $price = Price::where("priceId",  $id)->first();
        $price->delete();

        return redirect()->route("prices")->with("success", "Price deleted successfully.");
    }
}
