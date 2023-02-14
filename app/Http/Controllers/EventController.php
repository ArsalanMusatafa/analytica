<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventService;
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }
    public function index(){
        $events = Event::all();
        return view('event')->with(['events' => $events, 'count' => 1]);
    }

    public function create(){
        return view('event-create');
    }

    public function store(Request $request){
        $request->validate([
            'eventName' => 'required',
            'startDate' => 'required',
            'startTime' => 'required',
            'endDate' => 'required',
            'endTime' => 'required',
        ]);
        $data = $request->all();
        $create = $this->eventService->create($data);
        if($create){
            SendEmail::dispatch($create->attendee_emails);
            return redirect('/event')->with('success' , 'Event Created Successfully');
        }
        return redirect()->back()->with('error' , 'Event not Created, please try again later');
    }

    public function delete($id){
        $event = Event::find($id);
        if($event){
            $event->delete();
            return redirect()->back()->with('success' , 'Event deleted successfully');
        }
    }

}
