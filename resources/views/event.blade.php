@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
@endif
            <div class="row">
                <div class="col-md-10">
                    <h3>Events</h3>
                </div>
                <div class="col-md-2">
                    <a href="/event/create" class="btn btn-success">Add new Event</a>
                </div>
            </div>
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Event Name</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">View Attendees </th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <th>{{ $count ++ }}</th>
                            <td>{{ $event->event_name }}</td>
                            <td>{{ $event->start_date->format('Y-m-d') }}T{{ $event->start_time }}</td>
                            <td>{{ $event->end_date->format('Y-m-d') }}T{{ $event->end_time }}</td>
                            <td><a href="">View</a></td>
                            <td><a href="{{ url('event/'.$event->id) }}">Update</a> || <a href="{{ url('event/delete/'.$event->id) }}">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection