<?php

namespace App;


interface ConversionServiceInterface
{
    /**
     * @param int $int
     * @return string
     */
    public function convert(int $int): string;
}