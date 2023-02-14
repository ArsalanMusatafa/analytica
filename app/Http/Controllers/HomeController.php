<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::all();
        $eventsArray = [];
        foreach($events as $event){
            $eventsArray[] = [
                'title' => $event->event_name,
                'start' => $event->start_date->format('Y-m-d').'T'.$event->start_time,
                'end' => $event->end_date->format('Y-m-d').'T'.$event->end_time,
            ];
        }
        return view('home')->with(['events' => $eventsArray]);
    }
}
