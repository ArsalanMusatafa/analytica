<?php

namespace App\Services;

use App\Models\Event;

class EventService
{
    protected $model;

    public function __construct()
    {
        $this->model = new Event();
    }

    public function create($data){
        $event = new $this->model;
        return $this->prepareData($event, $data);
    }

    private function prepareData($event, $data){
        $event->event_name = $data['eventName'];
        $event->start_date = $data['startDate'];
        $event->end_date = $data['endDate'];
        $event->start_time = $data['startTime'];
        $event->end_time = $data['endTime'];
        $event->attendee_emails = $data['emails'];
        $event->save();
        return $event;

    }
}
