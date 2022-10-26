<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $key => $value) {
            Project::create([
                'transaction_id' => Str::uuid(),
                'provider_id' => 1,
                'consumer_id' => 8,
                'description' => 'Test description',
                'hours' => 2,
                'amount' => 1000,
            ]);
        }
    }
}
