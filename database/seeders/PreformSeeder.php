<?php

namespace Database\Seeders;

use App\Enums\PreformNameEnum;
use App\Models\Preform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preforms = PreformNameEnum::cases();

        foreach ($preforms as $key => $preform) {
            Preform::create([
                'name' => $preform,
            ]);
        }
    }
}
