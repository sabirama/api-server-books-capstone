<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderItem;
use App\Http\Resources\OrderItemResource;

use Illuminate\Http\Request;

class OrderItemController extends Controller
{
     public function index(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $orderItems = OrderItem::query()->paginate($pageSize);
        $itemResource = OrderItemResource::collection($orderItems);
        return response([
            'order_items' => $itemResource,
        ],201);
    }

    //display by name
    public function singleItem(Request $request,  $id)
    {
        $orderItemId = OrderItem::fidn($id);
        return response([
            'order_item' => $orderItemId
        ],201);
    }

    public function store(Request $request)
    {
        $orderItems = OrderItem::create($request->all());
        return response ([
            'order_deails' => $orderItems,
            'message' => 'order item added to database'
        ],201);
    }

    //update
    public function update(Request $request, $id)
    {
        $orderItems = OrderItem::find($id);
        $newOrderItems = $orderItems->update($request->all());

        return response ([
            'order_deails' => $$newOrderItems,
            'message' => 'order item updated'
        ],201);
    }

    //delete
    public function destroy($id)
    {

        $orderItems = OrderItem::find($id);
        $newOrderItems = $orderItems->delete();

        return response([
            'order_item' =>  $newOrderItems,
            'message' => 'order item removed'
        ]);
    }

}
