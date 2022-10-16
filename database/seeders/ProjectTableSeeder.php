<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,10) as $key => $value) {
            Project::create(['provider_id'=>1,
            'consumer_id'=>8,
            'title'=>'Test title',
            'description'=>'Test description',
            'accepted_at'=>now()]);
        }
    }
}
