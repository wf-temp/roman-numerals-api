<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RomanNumeralConversionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'arabic_numeral' => $this->arabic_numeral,
            'roman_numeral' => $this->roman_numeral,
            'number_of_times_converted' => $this->count,
            'date_time_last_converted' => $this->updated_at
        ];
    }
}
