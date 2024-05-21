<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CCSeeder::class);
        $this->call(CFSeeder::class);
        $this->call(TPSeeder::class);
        $this->call(ShopManuSeeder::class);
        $this->call(ToothSeeder::class);
        $this->call(OtherSeeder::class);
    }
}
