<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Card::create([
        'user_id'=>9,
        'holder_name'=>'provider',
        'bank_name'=>'seylan',
        'branch_name'=>'kandy',
        'branch_code'=>1234,
        'account_number'=>123456789
       ]);
    }
}
