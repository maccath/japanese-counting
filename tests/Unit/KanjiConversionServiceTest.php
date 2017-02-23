<?php

namespace Tests\Unit;

use App\KanjiConversionService;

class KanjiConversionServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider numeralsKanjiProvider
     * @param int $int
     * @param string $kanji
     */
    public function testKanjiConversionServiceCreatesKanji(int $int, string $kanji)
    {
        $KanjiConversionService = new KanjiConversionService();

        $this->assertEquals($kanji, $KanjiConversionService->convert($int));
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
          [10000, '一万'],
          [11000, '一万一千'],
          [11100, '一万一千百'],
          [11110, '一万一千百十'],
          [11111, '一万一千百十一'],
          [51111, '五万一千百十一'],
          [99999, '九万九千九百九十九'],
          [100000, '十万'],
          [109999, '十万九千九百九十九'],
          [109999, '十万九千九百九十九'],
          [110000, '十一万'],
          [119999, '十一万九千九百九十九'],
          [999999, '九十九万九千九百九十九'],
          [1000000, '百万'],
          [10000000, '一千万'],
          [90000000, '九千万'],
          [33333333, '三千三百三十三万三千三百三十三'],
          [99999999, '九千九百九十九万九千九百九十九'],
        ];
    }
}
