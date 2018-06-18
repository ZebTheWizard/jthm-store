<?php

namespace App\Http\Controllers;

use Auth;
use App\Cart;
use App\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $carts = Auth::user()->cart;

      $subtotals = [];
      $total = 0;

      foreach($carts as $cart) {
        $subtotal = $cart->item->price * $cart->quantity;
        array_push($subtotals, $subtotal);
        $total += $subtotal;
      }

      return view('cart', [
        "cart" => $carts,
        "subtotals" => $subtotals,
        "total" => $total
      ]);
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
    public function store(Request $r)
    {
      $user = Auth::user();
      $item = Item::find($r->id);
      // dd($r->all());

      $cart = Cart::firstOrCreate([
        "user_id" => $user->id,
        "item_id" => $item->id
      ]);
      $cart->increment('quantity');

      return response()->json([
        "itemCount" => Auth::user()->cartCount()
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
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
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
