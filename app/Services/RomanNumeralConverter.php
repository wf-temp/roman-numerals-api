<?php

namespace App\Services;

class RomanNumeralConverter implements IntegerConverterInterface
{
    const ARABIC_ROMAN_NUMERAL_MAP = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    ];



    public function convertInteger(int $integer): string
    {
        $converted_integer = "";
        foreach (self::ARABIC_ROMAN_NUMERAL_MAP as $arabic_numeral => $roman_numeral) {

            while ($integer >= $arabic_numeral) {
                $converted_integer .= $roman_numeral;
                $integer -= $arabic_numeral;
            }

            if ($integer == 0) {
                return $converted_integer;
            }
        }
    }

}
