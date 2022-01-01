@extends('appointments.layout')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

$(document).ready(function(){
        $(".add-row").click(function(){

            var markup = "<tr><td><input type='checkbox' name='record'></td><td> <select id ='service'  class='form-control'><option value="">-- choose service --</option>@foreach ($services as $service)<option value='{{ $service->name }}'>{{ $service->name }} ==>({{ number_format($service->price, 2) }} RS)</option>@endforeach</select></td><td><input name='qtdy[]' type='text'></td></tr>";
            $("table tbody").append(markup);
        }); });
</script>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Appointment</h2>
           
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
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

   
<form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    
                            <select id ='service'  class="form-control">
                                <option value="">-- choose service --</option>
                                @foreach ($services as $service)
                                    <option value='{{ $service->name }}'>
                                        {{ $service->name }} ==>
                                        ({{ number_format($service->price, 2) }} RS)
                                    </option>
                                @endforeach
                            </select>

                            <input type="number" id = "quant"  class="form-control"  />
                            <input type="button" class="add-row" value="Add Row">

                            <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Service</th>
                <th>QTY</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" name="record"></td>
                <td > <input type="text" value="name">

                </td>
                <td >
                <input type="text"value=2>
                </td>
            </tr>
        </tbody>
    </table>    
  
       
    <button type="submit" class="btn btn-primary">Submit</button>

       
    </div>
    
    </div> 
</form>
@endsection