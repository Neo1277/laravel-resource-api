<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Model\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(5)->create();
        \App\Models\Model\Product::factory(50)->create();
        \App\Models\Model\Review::factory(300)->create();
        //factory(App\Model\Product::class, 50)->create();
        //factory(App\Model\Review::class, 300)->create();
    }
}
