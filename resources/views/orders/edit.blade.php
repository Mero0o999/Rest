@extends('doctors.layout')
   
@section('content')
    <div class="row">
        <div class="col-md-8 margin-tb">
            <div class="pull-left">
                <h2>Edit Doctor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('doctors.index') }}"> Back</a>
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
    <div class="row  container justify-content-between">

  
    <form action="{{ route('doctors.update',$doctor->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="container row ">
            <div class="col-xs-6 ">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            
            <div class="col-xs-6 ">
                <div class="form-group">
                    <strong>Specialization:</strong>
                    <input type="text" name="specialization" class="form-control" placeholder="specialization">
                </div>
            </div>
            <br> <br> 
            <div class="col-xs-8 text-center">
            <br>  
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
    </div>
   
@endsection