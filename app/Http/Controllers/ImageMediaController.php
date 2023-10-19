<?php

namespace App\Http\Controllers;

use App\Models\ImageMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Public;
use File;

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
                'image_path' =>  $filepath,
                'image_name' => $filename,
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
        $image = ImageMedia::whereIn('image_type',[$type])->whereIn('associated_id', [$associatedId])->whereIn('image_path',[$filepath])->first();
        $storedImage = $image->first(); //** get the image */

        // check if file exist
        if ($image) {
            $storedImage->delete();
            // Storage::delete($filepath);
            File::delete(public_path("/storage/".$image->image_name));
        } else {
            return response([
                $image,
                'message'=> "File does not exist."
            ],301);
        }

        return [

            $image,
            'message'=> 'file deleted'
        ];
    }
}
