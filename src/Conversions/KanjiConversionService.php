<?php

namespace App\Conversions;

class KanjiConversionService implements ConversionServiceInterface
{
    /** @const int */
    const MAX_EXPONENT = 3;

    /** @const array */
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
        return $this->getTenThousandsKanji($this->getDigitForExponent($number, 4))
          . $this->getThousandsKanji($this->getDigitForExponent($number, 3))
          . $this->getHundredsKanji($this->getDigitForExponent($number, 2))
          . $this->getTensKanji($this->getDigitForExponent($number, 1))
          . $this->getUnitsKanji($this->getDigitForExponent($number, 0));
    }

    /**
     * @param int $number
     * @param int $exponent
     * @return int
     */
    private function getDigitForExponent(int $number, int $exponent): int
    {
        return $exponent > self::MAX_EXPONENT
            ? (int) floor($number / pow(10, $exponent))
            : (int) floor($number % pow(10, $exponent + 1) / pow(10, $exponent));
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