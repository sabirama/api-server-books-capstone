<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\OrderDetailsResource;

class OrderDetailsController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $orderDetails = OrderDetails::query()->paginate($pageSize);
        return OrderDetailsResource::collection($orderDetails);
    }

    //retturn a single item of order details
    public function singleItem(Request $request, $id)
    {
        $orderDetail = OrderDetails::find($id);
        return response([
            'order_detail' => $orderDetail,
        ]);
    }

     public function store(Request $request)
    {
        $orderDetails = OrderDetails::create($request->all());
        return response ([
            'order_deails' => $orderDetails,
            'message' => 'order details added to database'
        ],201);
    }

    //update
    public function update(Request $request, $id)
    {
        $orderDetails = OrderDetails::find($id);
        $newOderDetails = $orderDetails->update($request->all());

        return response ([
            'order_deails' => $$newOderDetails,
            'message' => 'order details updated'
        ],201);
    }

    //delete
    public function destroy($id)
    {
        $orderDetails = OrderDetails::find($id);
        $newOrderDetails = $orderDetails->delete();

        return response([
            'order_details' =>  $newOrderDetails,
            'message' => 'order details removed'
        ]);
    }
}
