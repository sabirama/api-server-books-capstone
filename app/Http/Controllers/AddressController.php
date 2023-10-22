<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Address;

class AddressController extends Controller
{
     public function index(Request $request) {
        $pageSize = $request->page_size ?? 200;
        return [
           'address' => Address::query()->paginate($pageSize)
        ];
    }

    //display by city
    public function city(Request $request)
    {
        $pageSize = $request->page_size ?? 200;
        return Address::orderBy('city')->paginate($pageSize);

    }

        //display by province
    public function province(Request $request)
    {
        $pageSize = $request->page_size ?? 200;
        return Address::orderBy('province')->paginate($pageSize);

    }


    //individual address
    public function show(Request $request, $id)
    {

        return Address::find($id);

    }

    //add new address
    public function store(Request $request)
    {
        $address = Address::create($request->all());
        return [
           'address'=>  $address,
           'message'=> 'address added to database'
        ];
    }

    //update
    public function update(Request $request, $id)
    {
        $address = Address::find($id);
        $address->update($request->all());
        return [
                $address,
                'file updated'
            ];
    }

    //delete
    public function destroy($id)
    {

        $address = Address::find($id);
        $address->delete();

        return [
            $address,
            'file removed'
        ];

    }
}
