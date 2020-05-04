<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Train;

use Auth;

class TrainController extends Controller
{
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
        $trains = Train::all();
        return view("trains.index", ["trains"=>$trains]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role->name != "ROLE_ADMIN") {
            return redirect()->back()->with("error", "Access denied");
        }
        return view("trains.create");
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
            return redirect()->back()->with("error", "Access denied");
        }
        $train = new Train;

        $this->validate($request,[
            "trainNumber" => "required",
            "location" => "required",
            "departureTime" => "required",
            "maximumLoad" => "required"
        ]);

        $train->trainNumber = $request->trainNumber;
        $train->location = $request->location;
        $train->isAvailable = $request->isAvailable;
        $train->departureTime = $request->departureTime;
        $train->maximumLoad = $request->maximumLoad;

        $train->save();

        return redirect()->route("trains")->with("success", "Train created successfully!");
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
            return redirect()->back()->with("error", "Access denied");
        }
        if (!Train::where("trainId",$id)->first()) {
            return redirect()->route("trains")->with("error", "Train not found!");
        }

        $train = Train::where("trainId",$id)->first();

        return view("trains.edit", ["train"=>$train]);
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
            return redirect()->back()->with("error", "Access denied");
        }

        if (!Train::where("trainId",$id)->first()) {
            return redirect()->route("trains")->with("error", "Train not found!");
        }

        $train = Train::where("trainId",$id)->first();
        $this->validate($request,[
            "trainNumber" => "required",
            "location" => "required",
            "departureTime" => "required",
            "maximumLoad" => "required"
        ]);

        $train->trainNumber = $request->trainNumber;
        $train->location = $request->location;
        $train->isAvailable = $request->isAvailable;
        $train->departureTime = $request->departureTime;
        $train->maximumLoad = $request->maximumLoad;

        $train->update();
        return redirect()->route("trains")->with("success", "Train updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Train::where("trainId",$id)->first()) {
            return redirect()->route("trains")->with("error", "Train not found!");
        }

        $train = Train::where("trainId",$id)->first();

        $train->delete();
        return redirect()->route("trains")->with("success", "Train deleted successfully!");
    }
}
