<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Graphic Design', 'Type Setting', 'Video Editing', 'Coding', 'Content Creation', 'Other'];
        foreach ($categories as $key => $value) {
            Category::create(['name' => $categories[$key]]);
        }
    }
}
