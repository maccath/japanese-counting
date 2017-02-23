<?php

namespace App;

use App\Conversions\ConversionServiceInterface;

class Numeral
{
    /** @var int */
    private $number;

    /**
     * @param int $number
     */
    public function __construct(int $number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param \App\Conversions\ConversionServiceInterface $conversionService
     * @return string
     */
    public function convert(ConversionServiceInterface $conversionService): string
    {
        return $conversionService->convert($this->number);
    }
}