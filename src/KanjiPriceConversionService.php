<?php

namespace App;

class KanjiPriceConversionService implements ConversionServiceInterface
{
    /** @var array */
    const DIGITS = [
        0 => '○',
        1 => '一',
        2 => '二',
        3 => '三',
        4 => '四',
        5 => '五',
        6 => '六',
        7 => '七',
        8 => '八',
        9 => '九',
        10 => '十',
    ];

    /**
     * {@inheritdoc}
     */
    public function convert(int $int): string
    {
        if ($int <= 10) return self::DIGITS[$int];

        return array_reduce(str_split((string) $int), function ($conversion, $digit) {
            return $conversion . self::DIGITS[$digit];
        });
    }
}