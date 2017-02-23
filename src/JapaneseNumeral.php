<?php

namespace App;

class JapaneseNumeral
{
    /** @var int */
    private $number;

    /** @var array */
    const DIGITS = [
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
     * @param int $number
     */
    public function __construct(int $number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getKanji(): string
    {
        return self::DIGITS[$this->number];
    }
}