<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Answer extends JsonResource
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
            'notes' => $this->notes,
            'is_correct' => $this->is_correct,
            'question_id' => $this->question_id,
            //'created_at' => $this->created_at,
            //'updated_at' => $this->updated_at
        ];
    }
}
