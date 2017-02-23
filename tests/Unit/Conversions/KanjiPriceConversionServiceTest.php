<?php

namespace Tests\Unit\Conversions;

use App\Conversions\KanjiPriceConversionService;

class KanjiPriceConversionServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider numeralsKanjiProvider
     * @param int $int
     * @param string $kanji
     */
    public function testKanjiPriceConversionServiceCreatesKanji(int $int, string $kanji)
    {
        $kanjiPriceConversionService = new KanjiPriceConversionService();

        $this->assertEquals($kanji, $kanjiPriceConversionService->convert($int));
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
          [20, '二○'],
          [200, '二○○'],
          [2500, '二五○○'],
          [2577, '二五七七'],
        ];
    }
}
