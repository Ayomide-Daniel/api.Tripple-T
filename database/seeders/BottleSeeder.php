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
      $bottles = BottleNameEnum::cases();

      foreach ($bottles as $key => $bottle) {
        Bottle::create([
          'name' => $bottle,
        ]);
      }
    }
}
