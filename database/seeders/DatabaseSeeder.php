<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Podcast;
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
        'name' => 'Emmanuel Adesina',
        'email' => 'platinumemirate@gmail.com',
        'password' => bcrypt('123456789'),
        'is_super' => true
      ]);
  
      Podcast::factory(10)->create();
    }
}
