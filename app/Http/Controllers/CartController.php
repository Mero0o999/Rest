<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Service;
use Auth;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::User()->id;
      //  $cart = DB::table('services')->join('carts','carts.service_id','=','services.id')->first();

        $carts = DB::table('services')->join('carts','carts.service_id','=','services.id')
        ->where('carts.user_id', $userID)->select('carts.*')->get();

        
        return view('carts.index',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = Cart::where('service_id', $request->id)->first();
        $service_check = Cart::where('service_id',$request->id)->exists();
        if(!$service_check){

            $cart = new Cart;
       
            $cart->user_id=Auth::User()->id;
            $cart->service_id = $request->id;
            $cart->name = $request->name;
            $cart->price = $request->price;
            $cart->image = $request->image;


            $cart->save();

         
            return redirect()->back()->with('success', 'It added to cart successfully!');
        }
        else
        {
         $carts->quantity = $carts->quantity + 1;
         $carts->save();

         return redirect()->route('services.index');
        }
    }

    public static function CartCount(){
        $userID =Auth::User()->id;
        return Cart::Where('user_id', $userID)->count();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
