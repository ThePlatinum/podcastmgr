<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Podcast>
 */
class PodcastFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'title' => fake()->words(3, true),
      'slug' => fake()->slug(6, true),
      'content_resource' => fake()->word(),
      'duration' => '01:23',
      'description' => fake()->paragraphs(5, true)
    ];
  }
}
