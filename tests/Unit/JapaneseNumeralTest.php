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

    /**
     * @dataProvider numeralsKanjiProvider
     * @param int $int
     * @param string $kanji
     */
    public function testJapaneseNumeralCreatesKanji(int $int, string $kanji)
    {
        $japaneseNumeral = new JapaneseNumeral($int);

        $this->assertEquals($kanji, $japaneseNumeral->getKanji());
    }

    public function numeralsKanjiProvider()
    {
        return [
          [1, '一'],
          [2, '二'],
          [3, '三'],
          [4, '四'],
          [5, '五'],
          [6, '六'],
          [7, '七'],
          [8, '八'],
          [9, '九'],
          [10, '十'],
        ];
    }
}
