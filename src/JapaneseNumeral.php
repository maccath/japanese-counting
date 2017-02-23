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
        100 => '百',
        1000 => '千',
        10000 => '万',
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
        return $this->getTenThousandsKanji($this->getTenThousands())
          . $this->getThousandsKanji($this->getThousands())
          . $this->getHundredsKanji($this->getHundreds())
          . $this->getTensKanji($this->getTens())
          . $this->getUnitsKanji($this->getUnits());
    }

    /**
     * @return int
     */
    private function getTenThousands(): int
    {
        return (int) floor($this->number / 10000);
    }

    /**
     * @return int
     */
    private function getThousands(): int
    {
        return (int) floor($this->number % 10000 / 1000);
    }

    /**
     * @return int
     */
    private function getHundreds(): int
    {
        return (int) floor($this->number % 1000 / 100);
    }

    /**
     * @return int
     */
    private function getTens(): int
    {
        return (int) floor($this->number % 100 / 10);
    }

    /**
     * @return int
     */
    private function getUnits(): int
    {
        return $this->number % 100 % 10;
    }

    /**
     * @param int $tenThousands
     * @return string
     */
    private function getTenThousandsKanji(int $tenThousands): string
    {
        return $tenThousands ? $this->getUnitsKanji($tenThousands) . self::DIGITS[10000] : '';
    }

    /**
     * @param int $thousands
     * @return string
     */
    private function getThousandsKanji(int $thousands): string
    {
        return $thousands ? $this->getUnitsKanji($thousands) . self::DIGITS[1000] : '';
    }

    /**
     * @param int $hundreds
     * @return string
     */
    private function getHundredsKanji(int $hundreds): string
    {
        if (!$hundreds) return '';

        return $hundreds == 1 ? self::DIGITS[100] : $this->getUnitsKanji($hundreds) . self::DIGITS[100];
    }

    /**
     * @param int $tens
     * @return string
     */
    private function getTensKanji(int $tens): string
    {
        if (!$tens) return '';

        return $tens == 1 ? self::DIGITS[10] : $this->getUnitsKanji($tens) . self::DIGITS[10];
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