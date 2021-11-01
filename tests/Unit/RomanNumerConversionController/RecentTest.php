<?php

namespace Tests\Unit\RomanNumberConversionController;

use App\Models\RomanNumeralConversion;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class RecentTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->uri = 'api/roman-numeral-conversions/recent';

    }

    public function testRecentRoute()
    {
        $response = $this->getJson($this->uri);
        $response->assertStatus(200);
    }

    public function testRecentDataStructure()
    {
        for ($i = 0; $i < 10; $i++) {
            RomanNumeralConversion::factory()->create();
        }

        $response = $this->getJson($this->uri);
        $response->assertJsonStructure([
                'data' => [
                    [
                        'arabic_numeral',
                        'roman_numeral',
                        'number_of_times_converted',
                        'date_time_last_converted',
                    ]
                ],
                'time_range_in_hours',
                'total_unique_conversions_returned'
            ]
        );
    }

    public function testRecentWithTimeSpanInHours()
    {
        for ($i = 0; $i < 10; $i++) {
            RomanNumeralConversion::factory()->create();
        }

        $response = $this->getJson($this->uri, ['time_span_in_hours => 5']);
        $response->assertStatus(200);
    }

    public function testRecentWithInvalidTimeSpanInHours()
    {
        for ($i = 0; $i < 10; $i++) {
            RomanNumeralConversion::factory()->create();
        }

        $response = $this->getJson($this->uri . '?time_span_in_hours=-7');
        $response->assertStatus(400);

        $response = $this->getJson($this->uri . '?time_span_in_hours=0');
        $response->assertStatus(400);

        $response = $this->getJson($this->uri . '?time_span_in_hours=999999999');
        $response->assertStatus(400);

        $response = $this->getJson($this->uri . '?time_span_in_hours=one');
        $response->assertStatus(400);
    }
}
