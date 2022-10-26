<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = Category::pluck('name')->toArray();

        foreach (range(1, 10) as $key => $value) {
            Profile::create(['title' => 'I will do '.$titles[random_int(0, 4)],
                'description' => 'This is description', 'user_id' => $key,
                'rate' => 500, ]);
        }
    }
}
