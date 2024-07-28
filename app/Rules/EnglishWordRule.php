<?php

namespace App\Rules;

use App\Models\Word;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Storage;

class EnglishWordRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $word = strtolower($value);
        $exists = Word::where('word', $word)->exists();

        if(!$exists){
            $fail('Has to be an English word');
        }
    }   
}
