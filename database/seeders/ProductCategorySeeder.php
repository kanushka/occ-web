<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insertOrIgnore([
            [
                'id' => 21,
                'type' => 'plan',
                'title' => 'modern',
                'created_at' => now(),
            ],
            [
                'id' => 22,
                'type' => 'plan',
                'title' => 'beach',
                'created_at' => now(),
            ],
            [
                'id' => 23,
                'type' => 'plan',
                'title' => 'simple',
                'created_at' => now(),
            ],
            [
                'id' => 24,
                'type' => 'plan',
                'title' => 'shop',
                'created_at' => now(),
            ],
            [
                'id' => 25,
                'type' => 'hardware',
                'title' => 'tools',
                'created_at' => now(),
            ],
            [
                'id' => 26,
                'type' => 'hardware',
                'title' => 'paint',
                'created_at' => now(),
            ],
            [
                'id' => 27,
                'type' => 'hardware',
                'title' => 'roof',
                'created_at' => now(),
            ]
        ]);
    }
}
