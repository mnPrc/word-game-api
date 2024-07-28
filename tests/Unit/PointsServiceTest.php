<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\PointsService;
use App\Utilities\PalindromeHelpers;


class PointsServiceTest extends TestCase 
{
    public function testCalcPoints()
    {
        $palindromeHelpers = new PalindromeHelpers();
        $pointsCalc = new PointsService($palindromeHelpers);

        $this->assertEquals(5 , $pointsCalc->addPoints('group'));
        $this->assertEquals(7 , $pointsCalc->addPoints('rotator'));
        $this->assertEquals(7 , $pointsCalc->addPoints('roTatoR'));
        $this->assertEquals(5 , $pointsCalc->addPoints('abca'));
    }
}