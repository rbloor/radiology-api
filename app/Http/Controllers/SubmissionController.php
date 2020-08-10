<?php

namespace App\Http\Controllers;

use App\Submission;
use Illuminate\Http\Request;
use App\Http\Resources\Submission as SubmissionResource;

class SubmissionController extends Controller
{
    public function index()
    {
        $submissions = Submission::all();
        return SubmissionResource::collection($submissions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'question_id' => ['required', 'numeric', 'exists:questions,id'],
            'is_correct' => ['boolean'],
        ]);

        $submission = Submission::create([
            'user_id' => $request->user_id,
            'question_id' => $request->question_id,
            'is_correct' => $request->is_correct,
        ]);

        return new SubmissionResource($submission);
    }
    
    public function show($id)
    {
        $submission = Submission::findOrFail($id);
        return new SubmissionResource($submission);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'question_id' => ['required', 'numeric', 'exists:questions,id'],
            'is_correct' => ['boolean'],
        ]);

        $submission = Submission::findOrFail($id);

        $submission->update($request->all());

        return new SubmissionResource($submission);
    }
    
    public function destroy($id)
    {
        return Submission::findOrFail($id)->delete();
    }
}
