<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table("users")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
        \App\Models\User::factory(5)->create();

        if (class_exists("MostafaKamel\AdvertiseringSystem\ServiceProvider")) {
            DB::statement("SET FOREIGN_KEY_CHECKS=0;");
            DB::table("filters")->truncate();
            DB::statement("SET FOREIGN_KEY_CHECKS=1;");
            DB::statement("SET FOREIGN_KEY_CHECKS=0;");
            DB::table("ads")->truncate();
            DB::statement("SET FOREIGN_KEY_CHECKS=1;");
            DB::statement("SET FOREIGN_KEY_CHECKS=0;");
            DB::table("ad_tag")->truncate();
            DB::statement("SET FOREIGN_KEY_CHECKS=1;");
            \MostafaKamel\AdvertiseringSystem\Models\Ad::factory(20)->freeStatus()->create();
            \MostafaKamel\AdvertiseringSystem\Models\Ad::factory(20)->paidStatus()->create();
        }
    }
}
