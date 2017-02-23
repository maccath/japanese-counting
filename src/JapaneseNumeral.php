<?php

namespace App;

class JapaneseNumeral
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
}