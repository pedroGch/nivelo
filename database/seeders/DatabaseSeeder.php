<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call(UserSeeder::class);
      $this->call(ReviewSeeder::class);
      $this->call(CategorySeeder::class);
      $this->call(SrcInformationSeeder::class);
      $this->call(UserDefinitionSeeder::class);
      //$this->call(UserMoreInfoSeeder::class);
      $this->call(PlaceSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
