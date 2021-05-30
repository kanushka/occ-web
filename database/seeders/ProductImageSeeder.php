<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProductImage::factory()
            ->count(20)
            ->create();
    }
}
