<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use MostafaKamel\AdvertiseringSystem\Models\Filter;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (class_exists('MostafaKamel\AdvertiseringSystem\Models\Filter')) {
            \MostafaKamel\AdvertiseringSystem\Models\Filter::factory(1)->tag()->create();
            $this->command->info("Console should show this message");
        }
    }
}
