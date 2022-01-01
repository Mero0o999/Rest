<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->paginate(5);
       $services = Service::all();

    
        return view('orders.index',compact('orders','services'))
           ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('orders.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function getprice( $id)
    {
    
        $service = Service::where('id', $id)->firstOrFail();
        if ($service == null) {
            return null;
        }
    
        return response()->json($service->price);
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantities' => 'required',
 
        ]);

$services = $request->input('services', []);
$quantities = $request->input('quantity', []);
    
        $order = Order::create($request->all());
        $order->save();
        for ($service=0; $service < count($quantities); $service++) {
            if ($services[$service] != '') {
                $order->services()->attach($services[$service], ['quantity' => $quantities[$service]]);
            }
        }      
        return redirect()->route('orders.index')
                        ->with('success','Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
