<?php

namespace App\Http\Controllers;

use App\Models\ImageMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageMediaController extends Controller
{

    public function index(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $images = ImageMedia::query()->paginate($pageSize);
        return response([
            'images' => $images,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
         $request->validate([
            'image' => 'mimes:jpeg,png,jpg',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('D-M-Y').time()."image".".png";
            $file->storeAs('public/',$filename);
            $filepath = '/public/'.$filename;
        }

        $image = ImageMedia::create([
                'image_path' =>  $filepath,
                'image_type' => $request->type,
                'associated_id' => $request->associated_id
            ]);

        return response([
            'image'=>$image,
            'message'=> 'file uploaded'
        ],200);

    }



    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $image = ImageMedia::find($request->get([$associated_id,$type]));
        return response([
            'image'=>$image,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // ** get request parameters*/
        $associatedId = $request->associated_id;
        $type = $request->type;
        $filepath = $request->image_path;
        $image = ImageMedia::whereIn('image_type',[$type])->whereIn('associated_id', [$associatedId])->whereIn('image_path',[$filepath]);
        $storedImage = $image->first(); //** get the image */

        //check if file exist
        if (Storage::exists($filepath)) {
            $storedImage->delete();
            Storage::delete($filepath);
        } else {
            return response([
                'message'=> "File does not exist."
            ]);
        }

        return response([
            $storedImage,
            'message'=> 'file deleted'
        ],200);
    }
}
