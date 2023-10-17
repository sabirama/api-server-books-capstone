<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ImageMedia;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         $image = ImageMedia::whereIn('image_type',['user_image'])->whereIn('associated_id', [$this->id])->get() ?? null;

        return [
            'id'=> $this->id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'username'=>$this->username,
            'email'=>$this->email,
            'gender'=>$this->gender,
            'birthdate'=>$this->birthdate,
            'profile_image' => $image
        ];
    }
}
