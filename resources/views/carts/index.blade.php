@extends('layouts.layout')

<script>

$(document).ready(function(){
    var i=1;
   
	
	$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});
	

});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			$(this).find('.total').val(qty*price);
			
			calc_total();
		}
    });
}

function calc_total()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
}
    </script>
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center">
                <!-- <h2>Carts</h2> -->
            </div>
            <!-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('doctors.create') }}"> Create New Doctor</a>
            </div> -->
        </div>
    </div>
    <br> 
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container px-6 mx-auto">
                <h3 class="text-2xl font-medium text-gray-700">Cart </h3>

                <table class="table table-bordered table-hover" id="tab_logic">
          <tr>
          <th hidden>ID</th>
          <th>Image</th>

            <th>Name</th>
            <th>Price</th>
            <th>َQTY</th>
            <th>subtotal</th>

            <th width="280px">Action</th>
        </tr>
        @php $total = 0 @endphp

        @foreach ($carts as $service)
        @php $total += $service->quantity * $service->price @endphp

        <tr>
        <th value ='{{ $service->id }}' hidden>{{ $service->id }}</th>
        <td><img src="{{ url($service->image) }}" alt="" class="w-20 rounded" alt="Thumbnail"></td>

            <td>{{ $service->name }}</td>
            <td class = 'price '><input readonly value = '{{ $service->price }}' type="number" name='price' placeholder='{{ $service->price }}' class="form-control price" step="0.00" min="0"/></td>

            <td  id='qty'>
            <input class ='qty' type="number" value="{{ $service->quantity }}" class="form-control quantity update-cart" /></td>
            <td id='total'>${{ $service->quantity * $service->price }}</td>


            <td>
                <form action="{{ route('carts.destroy',$service->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('carts.show',$service->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('carts.edit',$service->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

        <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>VAT 15% ${{ $total*0.15 }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total With TAX ${{ $total*0.15 + $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/services') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-success">Checkout</button>
            </td>
        </tr>
    </tfoot>
    </table>
  
    </div>  


    
@endsection