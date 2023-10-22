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
        return [
            'order_items' => $itemResource,
        ];
    }

    //display by name
    public function singleItem(Request $request,  $id)
    {
        $orderItemId = OrderItem::fidn($id);
        return [
            'order_item' => $orderItemId
        ];
    }

    public function store(Request $request)
    {
        $orderItems = OrderItem::create($request->all());
        return [
            'order_deails' => $orderItems,
            'message' => 'order item added to database'
        ];
    }

    //update
    public function update(Request $request, $id)
    {
        $orderItems = OrderItem::find($id);
        $orderItems->update($request->all());

        return [
            'order_deails' => $orderItems,
            'message' => 'order item updated'
        ];
    }

    //delete
    public function destroy($id)
    {

        $orderItems = OrderItem::find($id);
        $newOrderItems = $orderItems->delete();

        return [
            'order_item' =>  $newOrderItems,
            'message' => 'order item removed'
        ];
    }

}
