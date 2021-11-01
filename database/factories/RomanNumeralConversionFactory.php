<?php

namespace Database\Factories;

use App\Models\RomanNumeralConversion;
use App\Services\IntegerConverterInterface;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

class RomanNumeralConversionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RomanNumeralConversion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arabic_numeral = $this->faker->unique()->numberBetween(1, 3999);
        $roman_numeral = App::make(IntegerConverterInterface::class)->convertInteger($arabic_numeral);
        $count = $this->faker->unique()->numberBetween(1, 1000000);
        $created_at = $this->faker->dateTimeBetween('-1 hour', 'now');
        if ($count == 1) {
            $updated_at = $created_at;
        } else {
            $updated_at = $this->faker->dateTimeBetween($created_at, 'now');
        }

        return [
            'arabic_numeral' => $arabic_numeral,
            'roman_numeral' => $roman_numeral,
            'count' => $count,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ];
    }
}
