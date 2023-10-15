<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\OrderDetailsResource;

class OrderDetailsController extends Controller
{
    public function index() {
        $orderDetails = OrderDetails::query()->paginate(200);
        return OrderDetailsResource::collection($orderDetails);
    }
}
