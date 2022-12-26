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
      // \App\Models\User::factory()->create([
      //   'name' => 'Podcast Admin',
      //   'email' => 'blscpodcastmgr@gmail.com',
      //   'password' => bcrypt('RSS***FEEDS'),
      //   'is_super' => true
      // ]);
  
      $title = "Our Honest Welcome Note";
      Podcast::factory()->create([
        'title' => $title,
        'slug' => Str::slug($title, '-') . now(),
        'audio' => 'onichawelcome.mp3',
        'duration' => "108",
        'length' => "0:1:48",
        'description' => 
          "Onitcha Language is a beautiful language. \n It is the language of the people of Onitcha. It is a unique language. Every Onicha indigene is proud of her culture and heritage. 
           \n Thank you for joining me in the process of learning Onicha language. Through this podcast, you will learn to speak Onicha and the culture of Onitsha.
           \n This promises to be fun and interesting... so, make sure to subscribe to the podcast to get notified of every new episode. 
           \n Thanks."
      ]);
      Podcast::factory(5)->create();
    }
}
