<?php

namespace App\Services;

use App\Utilities\PalindromeHelpers;

class PointsService {
    
    protected $palindromeHelpers;

    public function __construct(PalindromeHelpers $palindromeHelpers)
    {
        $this->palindromeHelpers = $palindromeHelpers;
    }

    public function addPoints(string $word): int
    {
        $lowercaseWord = strtolower($word);
        $uniqueLetters = count(array_unique(str_split($lowercaseWord)));
        $points = $uniqueLetters;

        switch (true) {
            case $this->palindromeHelpers->isPalindrome($lowercaseWord):
                $points += 3;
                break;
            case $this->palindromeHelpers->isAlmostPalindrome($lowercaseWord):
                $points += 2;
                break;
            default:
                break;
        }

        return $points;
    }
}