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
          [11, '十一'],
          [12, '十二'],
          [13, '十三'],
          [14, '十四'],
          [15, '十五'],
          [16, '十六'],
          [17, '十七'],
          [18, '十八'],
          [19, '十九'],
          [20, '二十'],
          [21, '二十一'],
          [30, '三十'],
          [35, '三十五'],
          [99, '九十九'],
          [100, '百'],
          [101, '百一'],
          [150, '百五十'],
          [200, '二百'],
          [500, '五百'],
          [550, '五百五十'],
          [555, '五百五十五'],
          [999, '九百九十九'],
          [1000, '一千'],
          [1999, '一千九百九十九'],
          [9999, '九千九百九十九'],
        ];
    }
}
