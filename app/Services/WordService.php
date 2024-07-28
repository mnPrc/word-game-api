<?php

namespace App\Services;

class WordService {
    
    protected $pointsService;

    public function __construct(PointsService $pointsService)
    {
        $this->pointsService = $pointsService;
    }

    public function calcScore(string $word): int 
    {
        return $this->pointsService->addPoints($word);
    }
}