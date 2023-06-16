<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;

class SynchronisationController extends Controller
{
    //
    public function index(){
        //
        $e = Event::get();

        dd($e);
    }
}
