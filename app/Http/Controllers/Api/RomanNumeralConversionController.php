<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrequentRomanNumeralConversionsRequest;
use App\Http\Requests\RecentRomanNumeralConversionsRequest;
use App\Http\Requests\RomanNumeralConversionRequest;
use App\Http\Resources\RomanNumeralConversionResource;
use App\Http\Resources\RomanNumeralConversionResourceCollection;
use App\Models\RomanNumeralConversion;
use App\Repositories\RomanNumeralConversionRepository;
use App\Services\IntegerConverterInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;


class RomanNumeralConversionController extends Controller
{
    public function convert(
        RomanNumeralConversionRequest $request,
        RomanNumeralConversionRepository $roman_numeral_conversion_repository,
        IntegerConverterInterface $integer_converter
    )
    {
        $integer = $request->integer;
        $roman_numeral = $integer_converter->convertInteger($integer);
        $roman_numeral_conversion = $roman_numeral_conversion_repository->create($integer, $roman_numeral);
        return new RomanNumeralConversionResource($roman_numeral_conversion);
    }

    public function recent(RecentRomanNumeralConversionsRequest $request)
    {
        $time_range_in_hours = $request->time_range_in_hours ?? 1;
        $recent_date_string = Carbon::now()->subHours($time_range_in_hours)->toDateTimeString();
        $recent_conversions = RomanNumeralConversion::where('updated_at', '>', $recent_date_string)
            ->orderBy('updated_at', 'DESC')
            ->get();
        return (new RomanNumeralConversionResourceCollection($recent_conversions))->addOverviewInformation('time_range_in_hours', $time_range_in_hours);
    }

    public function mostFrequent(FrequentRomanNumeralConversionsRequest $request)
    {
        $conversions_returned_limit = $request->limit ?? 10;
        $most_frequent_conversions = RomanNumeralConversion::orderBy('count', 'DESC')->limit($conversions_returned_limit)->get();
        return (new RomanNumeralConversionResourceCollection($most_frequent_conversions))->addOverviewInformation('limit', $conversions_returned_limit);
    }

}
