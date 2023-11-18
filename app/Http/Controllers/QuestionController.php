<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showMostLikedQuestions()
    {
        $allQuestions = Question::with(['user', 'community', 'likes', 'dislikes', 'answers'])
            ->withCount(['likes', 'dislikes', 'answers'])
            ->orderBy('likes_count', 'desc')
            ->get();
        return view('pages.questions', ['questions' => $allQuestions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            return view('questions.show', [
                'question' => Question::where('id', $id)->firstOrFail()
            ]);
        }
        catch (ModelNotFoundException $e) {
            return "Question not found.";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        try {
            return view('questions.edit', [
                'question' => Question::where('id', $id)->firstOrFail()
            ]);
        }
        catch (ModelNotFoundException $e) {
            return "Question not found.";
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        try {
            $question = Question::where('id', $id)->firstOrFail();
            $question->title = $request->input('title');
            $question->content = $request->input('content');
            $question->save();
            return $this->show($id);
        }
        catch (ModelNotFoundException $e) {
            return "Question not found.";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
