<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use App\Http\Resources\Answer as AnswerResource;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::all();

        return AnswerResource::collection($answers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'is_correct' => ['boolean'],
            'question_id' => ['required', 'numeric', 'exists:questions,id']
        ]);

        return Answer::create([
            'name' => $request->name,
            'notes' => $request->notes,
            'is_correct' => $request->is_correct,
            'question_id' => $request->question_id
        ]);
    }
    
    public function show($id)
    {
        $answer = Answer::findOrFail($id);

        return new AnswerResource($answer);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'is_correct' => ['boolean'],
            'question_id' => ['required', 'numeric', 'exists:questions,id']
        ]);

        return Answer::findOrFail($id)->update([
            'name' => $request->name,
            'notes' => $request->notes,
            'is_correct' => $request->is_correct,
            'question_id' => $request->question_id
        ]);
    }
    
    public function destroy($id)
    {
        return Answer::findOrFail($id)->delete();
    }
}
