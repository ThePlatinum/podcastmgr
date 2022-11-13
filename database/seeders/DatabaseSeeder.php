<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Podcast;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User::factory()->create([
        'name' => 'Podcast Admin',
        'email' => 'blscpodcastmgr@gmail.com',
        'password' => bcrypt('123456789'),
        'is_super' => true
      ]);
  
      $title = "Our Honest Welcome Note";
      Podcast::factory()->create([
        'title' => $title,
        'slug' => Str::slug($title, '-'),
        'audio' => 'onichawelcome.mp3',
        'duration' => "24",
        'length' => "0:0:24",
        'description' => "Hi!  Welcome to the Onicha Ado Dialect Podcast, brought to you by Blended Learning and Study Center. We are glad you are joining us for an awesome learning experience. We will bring you wonderful topics, simple enough to get you into learning not just the Language, but also the culture of the People, to help build you into a near-native speaker of the dialect. These Lectures will be taught by native speakers of the language, and you sure will enjoy every piece of it. CHEERS!"
      ]);
      // Podcast::factory(20)->create();
    }
}
