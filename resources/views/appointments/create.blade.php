@extends('appointments.layout')
 
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Appointment</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('appointments.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('appointments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <select name="doctorName" id="doctor" class="form-control select2">
                @foreach($doctors as $doctor)
                <option >{{ $doctor->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Start:</strong>
                <input type="datetime-local" name="startTime" class="form-control" placeholder="start time">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>End:</strong>
                <input type="datetime-local" name="endTime" class="form-control" placeholder="end time">
            </div>
        </div>
        </br></br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
    </div> 
</form>
@endsection