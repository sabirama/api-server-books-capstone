<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderReview;

class OrderReviewController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $orderReview = OrderReview::query()->paginate($pageSize);

        return [
            'order_review' =>  $orderReview,
        ];


    }

    public function perUser(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $userId = $request->user_id ?? "";
        $orderReview = OrderReview::whereIn('user_id',[$userId])->paginate($pageSize);

        return [
            'order_review' => $orderReview,
        ];
    }

    //display latest
    public function latest(Request $request)
    {

        $pageSize = $request->page_size ?? 100;
        $orderReview = OrderReview::orderBy('created_at', 'desc')->paginate($pageSize);
        return [
            'order_review' =>  $orderReview,
        ];
    }

    //display by name
    public function singleReview($id)
    {
        $orderReview =  OrderReview::find($id);
        return [
            'order_review' =>  $orderReview,
        ];
    }

    //individual book
    public function show(Request $request, $userId)
    {
        $orderReview = OrderReview::wherIn('user_id',$userId);
        return [
            'order_review' =>  $orderReview,
        ];

    }

    //add new book
    public function store(Request $request)
    {   $orderReview = OrderReview::create($request->all());

        return [
            'order_review'=>$orderReview,
            'message'=>'order_review added to database'
        ];
    }

    //update
    public function update(Request $request, $id)
    {
        $orderReview = OrderReview::find($id);
        $orderReview->update($request->all());
    }

    //delete
    public function destroy($id)
    {

        $orderReview = OrderReview::find($id);
        $orderReview->delete();

        return [$orderReview, 'file removed'];

    }
}
