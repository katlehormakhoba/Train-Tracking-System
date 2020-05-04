<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/", "HomeController@index")->name("home");
Route::get("/home", "HomeController@index")->name("home");


Route::get('/testing', function () {
    return view("layouts.admin.base");
});

//Passenger
Route::get("/passenger/registration", "HomeController@createPassenger")->name("createPassenger");
Route::post("/passenger/register", "HomeController@storePassenger")->name("registerPassenger");

Route::get("/dashboard", "DashboardController@index")->name("dashboard");

Route::get("/home/logout", "HomeController@index")->name("homeLogout");

//tickets
Route::get('/tickets', 'TicketController@index')->name("tickets");
Route::get('/tickets/create', 'TicketController@create')->name("createTicket");
Route::post('/tickets/save', 'TicketController@store')->name("saveTicket");
Route::get('/tickets/show/{id}', 'TicketController@show')->name("showTicket");
Route::get('/tickets/edit/{id}', 'TicketController@edit')->name("editTicket");
Route::post('/tickets/update/{id}', 'TicketController@update')->name("updateTicket");
Route::post('/tickets/delete/{id}', 'TicketController@destroy')->name("deleteTicket");
Route::post('/tickets/unbook/{id}', 'TicketController@unbook')->name("unbookTicket");
Route::get('/tickets/rebook/{id}', 'TicketController@rebook')->name("rebookTicket");

//Train
Route::get('/trains', 'TrainController@index')->name("trains");
Route::get('/trains/create', 'TrainController@create')->name("createTrain");
Route::post('/trains/save', 'TrainController@store')->name("saveTrain");
Route::get('/trains/show/{id}', 'TrainController@show')->name("showTrain");
Route::get('/trains/edit/{id}', 'TrainController@edit')->name("editTrain");
Route::post('/trains/update/{id}', 'TrainController@update')->name("updateTrain");
Route::post('/trains/delete/{id}', 'TrainController@destroy')->name("deleteTrain");

//passengers
Route::get('/passengers', 'PassengerController@index')->name("passengers");
Route::post('/passengers/save', 'PassengerController@store')->name("savePassenger");
Route::get('/passengers/show/{id}', 'PassengerController@show')->name("showPassenger");
Route::get('/passengers/edit/{id}', 'PassengerController@edit')->name("editPassenger");
Route::post('/passengers/update/{id}', 'PassengerController@update')->name("updatePassenger");
Route::post('/passengers/delete/{id}', 'PassengerController@destroy')->name("deletePassenger");

//stations
Route::get('/stations', 'StationController@index')->name("stations");
Route::get('/stations/create', 'StationController@create')->name("createStation");
Route::post('/stations/save', 'StationController@store')->name("saveStation");
Route::get('/stations/show/{id}', 'StationController@show')->name("showStation");
Route::get('/stations/edit/{id}', 'StationController@edit')->name("editStation");
Route::post('/stations/update/{id}', 'StationController@update')->name("updateStation");
Route::post('/stations/delete/{id}', 'StationController@destroy')->name("deleteStation");

//cards
Route::get('/cards', 'CardController@index')->name("cards");
Route::get('/cards/create', 'CardController@create')->name("createCard");
Route::post('/cards/save', 'CardController@store')->name("saveCard");
Route::get('/cards/show/{id}', 'CardController@show')->name("showCard");
Route::get('/cards/edit/{id}', 'CardController@edit')->name("editCard");
Route::post('/cards/update/{id}', 'CardController@update')->name("updateCard");
Route::post('/cards/delete/{id}', 'CardController@destroy')->name("deleteCard");

//prices
Route::get('/prices', 'PriceController@index')->name("prices");
Route::get('/prices/create', 'PriceController@create')->name("createPrice");
Route::post('/prices/save', 'PriceController@store')->name("savePrice");
Route::get('/prices/show/{id}', 'PriceController@show')->name("showPrice");
Route::get('/prices/edit/{id}', 'PriceController@edit')->name("editPrice");
Route::post('/prices/update/{id}', 'PriceController@update')->name("updatePrice");
Route::post('/prices/delete/{id}', 'PriceController@destroy')->name("deletePrice");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
