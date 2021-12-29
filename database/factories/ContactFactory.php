<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [ 
            'name' => $this->faker->title(),
            'email' => $this->faker->unique()->safeEmail(),
            'department' =>$this->faker->title(),
            'created_at' => now(),
        ];
    }
}
