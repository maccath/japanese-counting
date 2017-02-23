<?php

namespace Tests\Unit;

use App\Conversions\ConversionServiceInterface;
use App\Numeral;

class NumeralTest extends \PHPUnit_Framework_TestCase
{
    public function testNumeralExists()
    {
        new Numeral(100);
    }

    /**
     * @expectedException
     */
    public function testNumeralMustTakeInteger()
    {
        new Numeral(1.5);
    }

    public function testCanConvert()
    {
        $int = random_int(0, 99999);
        $numeral = new Numeral($int);

        $conversionService = $this
          ->getMockBuilder(ConversionServiceInterface::class)
          ->getMock();

        $conversionService->method('convert')->with($int)->willReturn('converted!');

        $numeral->convert($conversionService);
    }
}
