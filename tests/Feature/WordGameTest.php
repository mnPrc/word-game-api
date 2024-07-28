<?php

namespace Tests\Feature;

use Tests\TestCase;

class WordGameTest extends TestCase
{
    public function testValidWord()
    {
        $response = $this->postJson('/api/word-game', ['word' => 'group']);
        $response->assertStatus(200)
                ->assertJson(['word' => 'group', 'score' => 5]);
    }

    public function testInvalidWord()
    {
        $response = $this->postJson('/api/word-game', ['word' => 'gegegegewf']);
        $response->assertStatus(422)
                ->assertJsonValidationErrors('word');
    }
}