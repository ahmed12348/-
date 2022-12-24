<?php

namespace Database\Factories;
use App\Models\Student;
Use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */


class StudentFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;
    public function definition()
    {

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,




        ];
    }
}
