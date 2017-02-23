<?php

namespace App;

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
     * @param \App\ConversionServiceInterface $conversionService
     * @return string
     */
    public function convert(ConversionServiceInterface $conversionService): string
    {
        return $conversionService->convert($this->number);
    }
}