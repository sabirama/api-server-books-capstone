<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Http\Resources\OrderDetailsResource;

class OrderDetailsController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $orderDetails = OrderDetails::query()->paginate($pageSize);
        return ['order_details'=>OrderDetailsResource::collection($orderDetails)];
    }


    //retturn a single item of order details
    public function singleItem(Request $request, $id)
    {
        $orderDetail = OrderDetails::find($id);
        return [
            'order_detail' => $orderDetail,
        ];
    }

     public function store(Request $request)
    {
        $orderDetails = OrderDetails::create($request->all());
        return [
            'order_deails' => $orderDetails,
            'message' => 'order details added to database'
        ];
    }

    //update
    public function update(Request $request, $id)
    {
        $orderDetails = OrderDetails::find($id);
        $newOderDetails = $orderDetails->update($request->all());

        return [
            'order_deails' => $$newOderDetails,
            'message' => 'order details updated'
        ];
    }

    //delete
    public function destroy($id)
    {
        $orderDetails = OrderDetails::find($id);
        $orderDetails->delete();

        return [
            'order_details' =>  $orderDetails,
            'message' => 'order details removed'
        ];
    }
}
