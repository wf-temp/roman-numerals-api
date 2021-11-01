<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RomanNumeralConversionResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $overview_information = [];

    public function addOverviewInformation($parameter, $value){
        $this->overview_information[$parameter] = $value;
        return $this;
    }

    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request){
        $this->overview_information['total_unique_conversions_returned'] = $this->count();
        return $this->overview_information;
    }
}
