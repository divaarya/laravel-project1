<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Matematika', 'Olahraga', 'Bahasa Jepang', 'Bahasa Indonesia', 'Bahasa Inggris']),
            'description' => $this->faker->sentence(8)
        ];
    }
}

