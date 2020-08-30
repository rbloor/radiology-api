<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use App\Http\Resources\Question as QuestionResource;
use App\Http\Resources\Answer as AnswerResource;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return QuestionResource::collection($questions);
    }

    public function shuffled()
    {
        $questions = Question::all()->shuffle();
        return QuestionResource::collection($questions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'source' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:single,multiple'],
            'is_checked' => ['boolean'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'user_id' => ['required', 'numeric', 'exists:users,id']
        ]);

        $question = Question::create([
            'name' => $request->name,
            'source' => $request->source,
            'type' => $request->type,
            'is_checked' => $request->is_checked,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id
        ]);
        
        if (isset($request->answers)) {
            foreach ($request->answers as $answer) {
                $question->answers()->save(new Answer($answer));
            }
        }

        return new QuestionResource($question);
    }
    
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return new QuestionResource($question);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'source' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:single,multiple'],
            'is_checked' => ['boolean'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'user_id' => ['required', 'numeric', 'exists:users,id']
        ]);

        $question = Question::findOrFail($id);

        if (isset($request->answers)) {
            foreach ($request->answers as $answer) {
                if (isset($answer['id'])) {
                    Answer::findOrFail($answer['id'])->update($answer);
                } else {
                    $question->answers()->save(new Answer($answer));
                }
            }
        }

        $question->update($request->all());

        return new QuestionResource($question);
    }
    
    public function destroy($id)
    {
        return Question::findOrFail($id)->delete();
    }
}
