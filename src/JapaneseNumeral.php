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
        return $this->getTensKanji($this->getTens())
          . $this->getUnitsKanji($this->getUnits());
    }

    /**
     * @return int
     */
    private function getTens(): int
    {
        return (int) floor($this->number / 10);
    }

    /**
     * @return int
     */
    private function getUnits(): int
    {
        return $this->number % 10;
    }

    /**
     * @param int $tens
     * @return string
     */
    private function getTensKanji(int $tens): string
    {
        if (!$tens) return '';

        return $tens == 1 ? '十' : $this->getUnitsKanji($tens) . '十';
    }

    /**
     * @param int $units
     * @return string
     */
    private function getUnitsKanji(int $units): string
    {
        return self::DIGITS[$units] ?? '';
    }
}