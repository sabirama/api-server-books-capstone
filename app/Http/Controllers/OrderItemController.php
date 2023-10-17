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
        $pageSize = $request->page_size ?? 200;
        $orderItems = OrderItem::query()->paginate($pageSize);
        return OrderItemResource::collection($orderItems);
    }

    //display by name
    public function singleItem(Request $request, $userId, $id)
    {
        $orderDetailId = Order::whereIn('user_id',[$userId])->get(['order_details_id']);

        if(OrderDetails::whereIn('id',[$orderDetailId])) {
            $orderItem = OrderItem::whereIn('id',[$id])->get();
            return OrderItemResource::collection($orderItem);
        }


    }

}
