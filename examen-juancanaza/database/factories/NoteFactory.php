<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
    'title' => $this->faker->sentence(),
    'content' => $this->faker->paragraph(),
    'priority' => $this->faker->numberBetween(1, 5),
    'category_id' => \App\Models\Category::factory(), // Crea una categoría automáticamente
];
    }
}
