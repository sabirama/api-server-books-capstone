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
        return [
            'images' => $images,
        ];
    }

    public function byQuery(Request $request) {
        $pageSize = $request->page_size ?? 100;
        $imageType = $request->image_type;
        $associatedId = $request->associated_id;
        $images = ImageMedia::whereIn('image_type', [$imageType])->whereIn('associated_id', [$associatedId])->paginate($pageSize);
        return [
            'images' => $images,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $image = ImageMedia::find($id);
        return [
            'image'=>$image,
        ];
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
                'image_path' =>  '/storage/'.$filename,
                'image_type' => $request->image_type,
                'associated_id' => $request->associated_id
            ]);

        return [
            'image'=>$image,
            'message'=> 'file uploaded'
        ];

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
            ],301);
        }

        return [
            $storedImage,
            'message'=> 'file deleted'
        ];
    }
}
