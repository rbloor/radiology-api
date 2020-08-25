<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Question as QuestionResource;
use App\Http\Resources\Submission as SubmissionResource;

class User extends JsonResource
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
            'email' => $this->email,
            'submissions' => SubmissionResource::collection($this->submissions),
            'questions' => QuestionResource::collection($this->questions),
            'unanswered_questions' => $this->unAnsweredQuestions,
            'questions_answered_wrong' => $this->questionsAnsweredWrong,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
