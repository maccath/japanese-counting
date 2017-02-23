<?php

namespace Tests\Unit;

use App\JapaneseNumeral;

class JapaneseNumeralTest extends \PHPUnit_Framework_TestCase
{
    public function testJapaneseNumeralExists()
    {
        new JapaneseNumeral(100);
    }

    /**
     * @expectedException
     */
    public function testJapaneseNumeralMustTakeInteger()
    {
        new JapaneseNumeral(1.5);
    }
}
