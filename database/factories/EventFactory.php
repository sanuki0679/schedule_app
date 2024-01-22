<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateStr = Carbon::now()->toDateString();
        $start = Carbon::create($dateStr)
            ->addDay(random_int(-30,30))
            ->addHour(random_int(9, 18));
        $end = Carbon::create($start)->addHour(random_int(1,3));
        return [
            'user_id' => 1,
            'title' => $this->faker->word(),
            'guest_count' => $this->faker->randomNumber(2),
            'child_count' => $this->faker->randomNumber(2),
            'seat' => $this->faker->word(4),
            'customer_name' => $this->faker->name,
            'customer_phone' => $this->faker->phoneNumber(14),
            'receptionist_name' => $this->faker->name,
            'final_confirmation' => $this->faker->word(2),
            'body' => $this->faker->realText(255),
            'start' => $start,
            'end' => $end
        ];
    }
}
