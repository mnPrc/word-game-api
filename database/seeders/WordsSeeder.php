<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Word;

class WordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = base_path('storage/app/english-words-20k.txt');

        if(file_exists($file)){
            $words = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $data = array_map(function($word){
                return ['word' => strtolower(trim($word))];
            }, $words);

            Word::insert($data);
        }else{
            echo "failed to import";
        }
    }
}
