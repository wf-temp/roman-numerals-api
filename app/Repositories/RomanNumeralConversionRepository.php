<?php


namespace App\Repositories;


use App\Models\RomanNumeralConversion;

class RomanNumeralConversionRepository
{
    public function create($arabic_numeral, $roman_numeral)
    {
        $roman_numeral_conversion = RomanNumeralConversion::where('arabic_numeral', $arabic_numeral)->first();

        if($roman_numeral_conversion){
            $roman_numeral_conversion->count++;
            $roman_numeral_conversion->save();
            return $roman_numeral_conversion;
        }

        return RomanNumeralConversion::create([
            'arabic_numeral'   => $arabic_numeral,
            'roman_numeral' => $roman_numeral,
        ]);

    }
}
