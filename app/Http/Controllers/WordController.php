<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitWordRequest;
use App\Services\WordService;

class WordController extends Controller
{   
    protected $wordService;

    public function __construct(WordService $wordService)
    {
        $this->wordService = $wordService;
    }

    public function submit(SubmitWordRequest $request)
    {
        $validated = $request->validated();

        $score = $this->wordService->calcScore($validated['word']);

        return response()->json([
            'success' => true,
            'word' => $validated['word'], 
            'score' => $score
        ]);
    }
}
