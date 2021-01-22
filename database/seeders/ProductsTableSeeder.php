<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products =
            [
                [
                    'name'      => 'Мука',
                    'type_id'   => 1,
                ],
                [
                    'name'      => 'Сахар',
                    'type_id'   => 1,
                ],
                [
                    'name'      => 'Мука',
                    'type_id'   => 2,
                ],
                [
                    'name'      => 'Сахар',
                    'type_id'   => 2,
                ]
            ];

        DB::table('products')->insert($products);
    }
}
