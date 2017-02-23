<?php

namespace App;

class KanjiConversionService implements ConversionServiceInterface
{
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
     * {@inheritdoc}
     */
    public function convert(int $int): string
    {
        return $this->getKanjiDigits($int);
    }

    /**
     * @param int $number
     * @return string
     */
    private function getKanjiDigits(int $number = 0): string
    {
        return $this->getTenThousandsKanji($this->getTenThousands($number))
          . $this->getThousandsKanji($this->getThousands($number))
          . $this->getHundredsKanji($this->getHundreds($number))
          . $this->getTensKanji($this->getTens($number))
          . $this->getUnitsKanji($this->getUnits($number));
    }

    /**
     * @param int $number
     * @return int
     */
    private function getTenThousands(int $number): int
    {
        return (int) floor($number / 10000);
    }

    /**
     * @param int $number
     * @return int
     */
    private function getThousands(int $number): int
    {
        return (int) floor($number % 10000 / 1000);
    }

    /**
     * @param int $number
     * @return int
     */
    private function getHundreds(int $number): int
    {
        return (int) floor($number % 1000 / 100);
    }

    /**
     * @param int $number
     * @return int
     */
    private function getTens(int $number): int
    {
        return (int) floor($number % 100 / 10);
    }

    /**
     * @param int $number
     * @return int
     */
    private function getUnits(int $number): int
    {
        return $number % 10000 % 1000 % 100 % 10;
    }

    /**
     * @param int $tenThousands
     * @return string
     */
    private function getTenThousandsKanji(int $tenThousands): string
    {
        return $tenThousands ? $this->getKanjiDigits($tenThousands) . self::DIGITS[10000] : '';
    }

    /**
     * @param int $thousands
     * @return string
     */
    private function getThousandsKanji(int $thousands): string
    {
        return $thousands ? $this->getKanjiDigits($thousands) . self::DIGITS[1000] : '';
    }

    /**
     * @param int $hundreds
     * @return string
     */
    private function getHundredsKanji(int $hundreds): string
    {
        if (!$hundreds) return '';

        return $hundreds == 1 ? self::DIGITS[100] : $this->getKanjiDigits($hundreds) . self::DIGITS[100];
    }

    /**
     * @param int $tens
     * @return string
     */
    private function getTensKanji(int $tens): string
    {
        if (!$tens) return '';

        return $tens == 1 ? self::DIGITS[10] : $this->getKanjiDigits($tens) . self::DIGITS[10];
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