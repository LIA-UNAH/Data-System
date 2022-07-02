<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->firstName($gender = null).' '.$this->faker->lastName,
            'email'=> $this->faker->email(),
            'password' =>$this->faker->numerify('########'),
            'type'=> 'cliente',
            'address' =>$this->faker->address,
            'telephone' =>$this->faker->numerify('########')
        ];
    }
}
