<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Answer as AnswerResource;
use App\Http\Resources\Category as CategoryResource;

class Question extends JsonResource
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
            'name' => $this->name,
            'short_name' => $this->short_name,
            'source' => $this->source,
            'type' => $this->type,
            'is_checked' => $this->is_checked,
            'answers' => AnswerResource::collection($this->answers),
            'category' => $this->category,
            'user_id' => $this->user_id,
            //'created_at' => $this->created_at,
            //'updated_at' => $this->updated_at
        ];
    }
}
