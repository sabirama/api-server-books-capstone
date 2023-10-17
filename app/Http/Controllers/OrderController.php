<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 50;
        $orders = Order::query()->paginate($pageSize);
        return response([
            'order' => OrderResource::collection($orders),
        ],201);
    }

    //display by name
    public function userId(Request $request)
    {
        $pageSize = $request->page_size ?? 50;
        $orders = Order::orderBy('user_id')->paginate($pageSize);
        $orderResource = OrderResource::collection($orders);

        return response([
            'id' => $this->id,

        ],201);
    }

    //individual order
    public function show(Request $request,$userId, $id)
    {
        $userItems = Order::whereIn('user_id',[$userId])->whereIn('id',[$id])->get();
        return response([
            'orders' => OrderResource::collection($userItems),
        ],201);
    }

        public function perUser(Request $request,$userId)
    {
        $pageSize = $request->page_size ?? 200;
        $order = Order::whereIn('user_id',[$userId])->paginate($pageSize);
        return response([
           'oreder'=> OrderResource::collection($order),
        ],201);
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
        $order = Order::find($id);
        $order->delete();

        return [$order, 'file removed'];
    }
}
