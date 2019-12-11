<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $Created_at,
            'updated_at' => $Updated_at,
        ];
    }
}
