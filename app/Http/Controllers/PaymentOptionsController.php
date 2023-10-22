<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentOptions;

class PaymentOptionsController extends Controller
{
    //show all payment options
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 200;
        return [
           'payment_options' => PaymentOptions::query()->paginate($pageSize)
        ];
    }


    //individual address
    public function show(Request $request, $id)
    {

        return [
            PaymentOptions::find($id),
            "message"=> "test"
        ];

    }

    //add new address
    public function store(Request $request)
    {
        $paymentOption = PaymentOptions::create($request->all());
        return [
           'payment_option'=>  $paymentOption,
           'message'=> 'payment option added to database'
        ];
    }

    //update
    public function update(Request $request, $id)
    {
        $paymentOption = PaymentOptions::find($id);
        $paymentOption->update($request->all());
        return [
                $paymentOption,
                'file updated'
            ];
    }

    //delete
    public function destroy($id)
    {

        $paymentOption = PaymentOptions::find($id);
        $paymentOption->delete();

        return [
            $paymnetOption,
            'file removed'
        ];

    }
}
