<?php

namespace Tests\Unit;

use App\Models\RomanNumeralConversion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MostFrequentTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->uri = 'api/roman-numeral-conversions/most-frequent';
    }

    public function testMostFrequentRoute()
    {
        $response = $this->getJson($this->uri);
        $response->assertStatus(200);
    }

    public function testMostFrequentDataStructure()
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
                'limit',
                'total_unique_conversions_returned'
            ]
        );
    }

    public function testMostFrequentWithLimit()
    {
        for ($i = 0; $i < 10; $i++) {
            RomanNumeralConversion::factory()->create();
        }

        $response = $this->getJson($this->uri, ['limit => 5']);
        $response->assertStatus(200);
    }

    public function testMostFrequentWithInvalidLimit()
    {
        for ($i = 0; $i < 10; $i++) {
            RomanNumeralConversion::factory()->create();
        }

        $response = $this->getJson($this->uri . '?limit=-7');
        $response->assertStatus(400);

        $response = $this->getJson($this->uri . '?limit=0');
        $response->assertStatus(400);

        $response = $this->getJson($this->uri . '?limit=999999999');
        $response->assertStatus(400);

        $response = $this->getJson($this->uri . '?limit=one');
        $response->assertStatus(400);

    }


}
