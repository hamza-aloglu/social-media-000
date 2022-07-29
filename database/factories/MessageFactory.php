<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class MessageFactory extends Factory
{
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            ];
    }

    public function test_models_can_be_instantiated()
    {
        return $message = Message::factory()->make();
    }

    public function test_models_can_be_persisted()
    {
        // Create a single App\Models\User instance...
        return Message::factory()->create();
    }
}
