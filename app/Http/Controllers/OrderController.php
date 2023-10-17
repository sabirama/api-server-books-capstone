<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 200;
        $orders = Order::query()->paginate($pageSize);
        return OrderResource::collection($orders);
    }

    //display by name
    public function userId(Request $request)
    {
        $pageSize = $request->page_size ?? 200;
        $orders = Order::orderBy('user_id')->paginate($pageSize);
        $orderResource = OrderResource::collection($orders);

        return response([
            'id' => $this->id,

        ],200);
    }

    //individual order
    public function show(Request $request,$userId, $id)
    {
        $userItems = Order::whereIn('user_id',[$userId])->whereIn('id',[$id])->get();
        return OrderResource::collection($userItems);
    }

        public function perUser(Request $request,$userId)
    {
        $pageSize = $request->page_size ?? 200;
        $order = Order::whereIn('user_id',[$userId])->paginate($pageSize);
        return OrderResource::collection($order);
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
