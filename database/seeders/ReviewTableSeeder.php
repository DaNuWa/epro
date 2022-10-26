<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 50) as $key => $value) {
            Review::create(['star_rate' => rand(1, 5),
                'review' => 'very good work.Will do more buissnes in future',
                'profile_id' => rand(1, 5),
                'consumer_id' => rand(1, 5),
            ]);
        }
    }
}
