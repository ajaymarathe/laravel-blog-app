<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\post;
use App\User;
use Carbon\Carbon;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $Created_at = Carbon::parse($this->created_at)->diffForHumans();
        $Updated_at = Carbon::parse($this->updated_at)->diffForHumans();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->image,
            // 'user' => auth()->guard('api')->user()->name,
            'user' =>  new UserResource($this->user),
            'created_at' =>  $Created_at,
            'updated_at' => $Updated_at,
        ];
    }
}
