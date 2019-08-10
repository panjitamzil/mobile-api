<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductKnowledge extends JsonResource
{
    /**
     * Transform the resource into an array.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'filename' => $this->filename,
          'car_modal' => $this->carModel,
          'category' => $this->product_knowlagde_category,
          'created_at' => $this->created_at
        ];
    }
}
