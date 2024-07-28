<?php

namespace App\Utilities;

class PalindromeHelpers{

    public function isPalindrome(string $word): bool
    {
        return $word === strrev($word);
    }

    public function isAlmostPalindrome(string $word): bool
    {
        $length = strlen($word);
        for($i = 0; $i < $length; $i++){
            $temp = substr($word, 0 , $i) . substr($word, $i + 1);
            if($this->isPalindrome($temp)){
                return true;
            }
        }
        return false;
    }
}