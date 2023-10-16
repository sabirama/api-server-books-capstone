<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class OrderItemController extends Controller
{
     public function index(Request $request) {
        $pageSize = $request->page_size ?? 200;
        return OrderItem::query()->paginate($page_size);
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
