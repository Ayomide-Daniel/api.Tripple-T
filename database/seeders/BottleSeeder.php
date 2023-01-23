<?php

namespace Database\Seeders;

use App\Enums\BottleNameEnum;
use App\Models\Bottle;
use Illuminate\Database\Seeder;

class BottleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bottle::create([
          'name' =>  BottleNameEnum::_6CL,
        ]);

        Bottle::create([
          'name' =>  BottleNameEnum::_10CL,
        ]);

        Bottle::create([
          'name' =>  BottleNameEnum::_125ML,
        ]);

        Bottle::create([
          'name' =>  BottleNameEnum::_185ML,
        ]);

        Bottle::create([
          'name' =>  BottleNameEnum::_20CL,
        ]);

        Bottle::create([
          'name' =>  BottleNameEnum::_25CL,
        ]);

        Bottle::create([
          'name' =>  BottleNameEnum::_35CL,
        ]);

        Bottle::create([
          'name' =>  BottleNameEnum::_50CL,
        ]);

        Bottle::create([
          'name' =>  BottleNameEnum::_60CL,
        ]);

        Bottle::create([
          'name' =>  BottleNameEnum::_75CL,
        ]);
    }
}
