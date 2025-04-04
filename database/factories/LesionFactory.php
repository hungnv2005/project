<?php

namespace Database\Factories;

use App\Models\Lesion;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class LesionFactory extends Factory
{
    protected $model = Lesion::class;

    public function definition()
    {
        return [
            'course_id' => Course::factory(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(640, 480, 'education'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
