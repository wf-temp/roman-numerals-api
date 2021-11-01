<?php

namespace Tests\Unit;

use App\Models\RomanNumeralConversion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConvertTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->uri = 'api/roman-numeral-conversions/convert';
    }

    public function testConvertDataStructure()
    {
        $response = $this->postJson($this->uri, ['integer' => 1]);
        $response->assertJsonStructure([
                'data' => [
                    'arabic_numeral',
                    'roman_numeral',
                    'number_of_times_converted',
                    'date_time_last_converted',
                ],
            ]
        );
    }

    public function testConvertWithNoOrInvalidInteger()
    {
        $response = $this->postJson($this->uri);
        $response->assertStatus(400);

        $response = $this->postJson($this->uri,['integer' => '-7']);
        $response->assertStatus(400);

        $response = $this->postJson($this->uri,['integer' => '0']);
        $response->assertStatus(400);

        $response = $this->postJson($this->uri,['integer' => 'one']);
        $response->assertStatus(400);

        $response = $this->postJson($this->uri,['integer' => '999999999999999']);
        $response->assertStatus(400);
    }

}
