<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use \App\Http\Resources\CartResource;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageSize = $request->page_size ?? 200;
        $cart=Cart::all();

       return ['cart'=>CartResource::collection($cart)];
    }

        /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $cart = Cart::whereIn('id', [$id])->get();
          return $cart;
    }

        /**
     * Display the specified resource.
     */
    public function showUser($id)
    {
         $cart = Cart::whereIn('user_id', [$id])->first();
          return $cart;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = Cart::create($request->all());
        return [
           'cart'=>  $cart,
           'message'=> 'created cart'
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return[$cart, 'message'=> 'removed cart from database'];

    }
}
