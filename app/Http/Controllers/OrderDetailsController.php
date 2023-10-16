<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\OrderDetailsResource;

class OrderDetailsController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 200;
        $orderDetails = OrderDetails::query()->paginate($page_size);
        return OrderDetailsResource::collection($orderDetails);
    }
}
