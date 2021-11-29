<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }

    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions')->first();
        return view('quiz', compact('quiz'));
    }

    public function quiz_detail($slug)
    {
        $quiz = Quiz::whereSlug($slug)->withCount('questions')->first() ?? abort(404, 'Quiz Bulunamadı');
        return view('quiz_detail', compact('quiz'));
    }

    public function result(Request $request, $slug)
    {
        $quiz = Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404, 'Quiz Bulunamadı');
        foreach ($quiz->questions as $question) {
            //echo $question->id . '-' . $question->correct_answer . ' / ' . $request->post($question->id) . '</br>';
            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer'=> $request->post($question->id),
            ]);
        }
    }
}
