<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::query()->paginate(200);
        return OrderResource::collection($orders);
    }

    //display by name
    public function userId(Request $request)
    {
        $orders = Order::orderBy('user_id')->paginate(200);
        return OrderResource::collection($orders);
    }

    //individual order
    public function show(Request $request,$userId, $id)
    {
        $userItems = Order::whereIn('user_id',[$userId])->get();
        return OrderResource::collection($userItems)->paginate(200);
    }

        public function perUser(Request $request,$userId)
    {
        return Order::whereIn('user_id',[$userId])->get();
    }

    //add new order
    public function store(Request $request)
    {
        return Order::create($request->all());
    }

    //update
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->all());
    }

    //delete
    public function destroy($id)
    {
        if(Order::where('id',$id)) {
            $order = Order::find($id);
            $order->delete();

            return [$order, 'file removed'];
        }
    }
}
