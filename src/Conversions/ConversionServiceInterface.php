<?php

namespace App\Conversions;

interface ConversionServiceInterface
{
    /**
     * @param int $int
     * @return string
     */
    public function convert(int $int): string;
}