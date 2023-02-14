@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                <div class="col-md-10">
                    <h3>Create Event</h3>
                </div>
            </div>
            <form method="post" action="/event">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Event Name</label>
                    <input type="text" class="form-control" name="eventName" aria-describedby="emailHelp" placeholder="Enter Event Name">
                </div>
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">Start Date</label>
                        <input type="date" name="startDate" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Start Time</label>
                        <input type="time" name="startTime" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">End Date</label>
                        <input type="date" name="endDate" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">End Time</label>
                        <input type="time" name="endTime" class="form-control" placeholder="">
                    </div>
                    <div class="row mt-3" id="dynamic_field">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                    <div class="col-md-2">
                    <button type="button" name="add" id="add" class="btn btn-success mt-2">Add Attendee</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    var i=1;  


$('#add').click(function(){  
     i++;  
     $('#dynamic_field').append('<div id="row'+i+'" class="row mb-3"><div class="form-group col-md-11"><input type="text" name="emails[]" placeholder="Enter Email" class="form-control name_list" /></div><div class="col-md-1"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
}); 
$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 
    </script>
@endsection