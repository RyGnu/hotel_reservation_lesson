<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Reservation;

class ReservationController extends Controller
{
    public function index (){
        $reservations = Reservation::all();
        return view('/hotels',compact('reservations'));
    }

    public function register (Request $request){
        $reservation = new Reservation();

        $reservation->name = $request->name;
        $reservation->start_date = $request->start_date;
        $reservation->end_date = $request->end_date;
        
        $reservation->save();
    
        return redirect('/hotels');
    }

    public function select_hotel (Request $request){
        $name = $request->name;
        return view('/reservations',compact('name'));
    }

    public function delete (Reservation $reservations) {
        $reservations->delete();

        return redirect('/hotels');  
    }      
}