<x-guest-layout>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script>
                        $("#service").on('change', function () {
                    var id = $(this).val();
                    var a=$(this).parent();
        
                    @foreach ($services as $service)
                    if(id == {{ $service->id }}){
                        $('#prices').val({{ $service->price }});
                        document.getElementById("prices").innerHTML = {{ $service->price }};

                       // a.find('#prices').val({{ $service->price }});
                        }


                    
                    @endforeach
                    // $.ajax({
                    //     url: '/getprice/'+id,
                    //     method: 'GET',
                    //     success: function (response) {
                    //         console.log(response);
                    //         $("prices").val(response);
                    //     },
                    // });
                });
            </script>
<script>

$(document).ready(function(){
        $(".add-row").click(function(){

            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" +
            "<select id ='service' name='services[]' class='form-control'>"+
            "<option value='' >-- choose service --</option>@foreach ($services as $service)"+
            "<option value='{{ $service->id }}'>{{ $service->name }} </option>@endforeach</select></td> "+
            "<td><input id = 'prices'  class='form-control prices' type='number'></td>"+
            "<td><input name='quantities[]' class='form-control' type='number'></td></tr>";
            $("table tbody").append(markup);
        }); 
    });
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
<!--     
                            <select id ='service'  class="form-control">
                                <option value="">-- choose service --</option>
                                @foreach ($services as $service)
                                    <option value='{{ $service->name }}'>
                                        {{ $service->name }} ==>
                                    </option>
                                    <input type="number" />
                                @endforeach
                            </select> -->

                            <!-- <input type="number" id = "quant"  class="form-control"  /> -->
                            <input type="button" class="add-row" value="Add Row">

                            <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Service</th>
                <th>[Price]</th>
                <th>QTY</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>    
  
       
    <button type="submit" class="btn btn-primary">Submit</button>

       
    </div>
    
    </div> 
</form>
</x-guest-layout>