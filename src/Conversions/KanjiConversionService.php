<?php

namespace App\Conversions;

class KanjiConversionService implements ConversionServiceInterface
{
    /** @const int exponents */
    const UNITS = 0;
    const TENS = 1;
    const HUNDREDS = 2;
    const THOUSANDS = 3;
    const TENTHOUSANDS = 4;

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
        return array_reduce(range(self::TENTHOUSANDS, 0, -1), function ($string, $exponent) use ($number) {
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
        return $exponent >= self::TENTHOUSANDS
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

        if (!$exponent || !$number) return self::DIGITS[$number] ?? '';

        if ($this->prefixIfSingular($exponent) || $number > 1) {
           $prefix = $this->getKanjiDigits($number);
        }

        return ($prefix ?? '') . self::DIGITS[pow(10, $exponent)];
    }

    /**
     * When displaying a singular value of an exponential kanji, do we prefix
     * it with the kanji for 'one'?
     *
     * 一百 (one hundred - invalid) vs　百 (hundred - valid)
     * 一千　(one thousand - valid) vs 千 (thousand - invalid)
     *
     * @param int $exponent
     * @return bool
     */
    private function prefixIfSingular(int $exponent): bool
    {
        return ! ($exponent == self::TENS || $exponent == self::HUNDREDS);
    }
}