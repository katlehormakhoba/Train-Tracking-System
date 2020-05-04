<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Passenger;
use Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $userInstance    = new User;
        $roleInstance    = new Role;

        $email = "admin@tts.com";
        $password = "adminpass";
        $role = "ROLE_ADMIN";

        if (!User::where("email", $email)->first()) {
            $roleInstance->name = $role;
            $roleInstance->save();

            $userInstance->roleId = $roleInstance->roleId;
            $userInstance->email    = $email;
            $userInstance->password = Hash::make($password);

            $userInstance->save();
            if (Auth::check()) {
                Auth::logout();
            }
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route("home");
    }

    public function createPassenger()
    {
        return view("home.createPassenger");
    }

    public function storePassenger(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "email"=>"required|email",
            "password" => "required|confirmed|min:6"
        ]);

        $roleInstance = new Role;
        $user = new User;
        $passenger = new Passenger;

        if (Role::where("name", "ROLE_PASSENGER")->first()) {
            $role = Role::where("name", "ROLE_PASSENGER")->first();
            $user->roleId = $role->roleId;
            
        }else{
            $roleInstance->name = "ROLE_PASSENGER";
            $roleInstance->save();
            $user->roleId = $roleInstance->roleId;
        }

        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if (User::where("email", $request->email)->first()) {
            return redirect()->back()->with("error", "Passenger with email $request->email already exist!");
        }

        $user->save();

        $passenger->name = $request->name;
        $passenger->userId = $user->userId;

        $passenger->save();

        if (!Auth::check()) {
            Auth::login($user);
        }

        return redirect()->route("dashboard")->with("success", "Registered successfully!");
    }
    
    public function index()
    {
        return view('welcome');
    }
}
