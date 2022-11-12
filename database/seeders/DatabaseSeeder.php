<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Card;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'provider@test.com'
        ]);

        $this->call(CardTableSeeder::class);

        \App\Models\User::factory()->create([
            'is_provider' => false,
            'email' => 'consumer@test.com'
        ]);
        \App\Models\User::factory()->create([
            'is_superadmin' => true,
            'email' => 'admin@test.com',
            'password' => Hash::make("password")
        ]);


        $this->call(CategoryTableSeeder::class);
        // $this->call(ProfileTableSeeder::class);
        // $this->call(PhotoTableSeeder::class);
        // $this->call(ReviewTableSeeder::class);
        // $this->call(ProjectTableSeeder::class);
    }
}
