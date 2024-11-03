<?php

namespace Database\Factories;

use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    protected $model = Guest::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->generatePhoneNumber(),
            'country' => $this->faker->country,
        ];
    }

    private function generatePhoneNumber()
    {
        $code = rand(1, 99); // Генерация кода страны
        $xxx = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $yyy = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $zz = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);
        $ww = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);

        return "+$code-$xxx-$yyy-$zz-$ww";
    }
}
