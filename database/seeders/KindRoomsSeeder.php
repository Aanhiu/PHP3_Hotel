<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KindRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fake du lieu
        $fake = Faker::create();
        foreach(range(0, 5) as $index){
            // chi dinh bang fake du lieu
            DB::table('KindRooms')->insert([
                'name'=>$fake->name,
                'description'=>$fake->text,
            ]);
        }
    }
}
