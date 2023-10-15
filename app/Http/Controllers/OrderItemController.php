<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class OrderItemController extends Controller
{
     public function index() {
        return OrderItem::query()->paginate(50);
    }

    //display by name
    public function singleItem(Request $request, $userId, $id)
    {
        $orderDetailId = Order::whereIn('user_id',[$userId])->get(['order_details_id']);

        if(OrderDetails::whereIn('id',[$orderDetailId])) {
            return OrderItem::whereIn('id',[$id])->get();
        }


    }

}
