<?php

namespace App\Conversions;

class KanjiConversionService implements ConversionServiceInterface
{
    /** @const int */
    const MAX_EXPONENT = 4;

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
        return array_reduce(range(self::MAX_EXPONENT, 0, -1), function ($string, $exponent) use ($number) {
           return $string . $this->getKanjiForExponent($number, $exponent);
        });
    }

    /**
     * @param int $number
     * @param int $exponent
     * @return int
     */
    private function getDigitForExponent(int $number, int $exponent): int
    {
        return $exponent == self::MAX_EXPONENT
            ? (int) floor($number / pow(10, $exponent))
            : (int) floor($number % pow(10, $exponent + 1) / pow(10, $exponent));
    }

    /**
     * @param int $number
     * @param int $exponent
     * @return string
     */
    private function getKanjiForExponent(int $number, int $exponent): string
    {
        $number = $this->getDigitForExponent($number, $exponent);

        if (!$exponent) return self::DIGITS[$number] ?? '';
        if (($exponent == 1 || $exponent == 2) && !$number) return '';
        if (($exponent == 1 || $exponent == 2) && $number == 1) return self::DIGITS[pow(10, $exponent)];

        return $number ? $this->getKanjiDigits($number) . self::DIGITS[pow(10, $exponent)] : '';
    }
}