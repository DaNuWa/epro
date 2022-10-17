<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         \App\Models\User::factory(8)->create();

        \App\Models\User::factory()->create([
            'is_provider' => true,
        ]);

        $this->call(CategoryTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(PhotoTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
    }
}
