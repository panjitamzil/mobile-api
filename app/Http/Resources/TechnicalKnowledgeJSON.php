<?php

namespace App\Http\Resources;

use App\Http\Resources\CarModel;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TechnicalProblemCategoryJSON;

class TechnicalKnowledgeJSON extends JsonResource
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
        'car_modal' => new CarModel($this->carModel), 
        'technical_problem_category' => new TechnicalProblemCategoryJSON($this->technical_problem_category), 
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
      ];
    }
}
