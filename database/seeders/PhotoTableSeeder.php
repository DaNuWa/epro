<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;
class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

 /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }


    public function run()
    {
        $profiles=Profile::pluck('id')->toArray();
        foreach($profiles as $profile){
            foreach (range(1,5) as $key => $value) {
                Photo::create(['profile_id'=>$profile,'path'=>$this->faker->imageUrl(400,300, null, true) ]);
            }
        }
    }
}
