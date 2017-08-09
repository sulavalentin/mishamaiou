<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\DB::table('products')->disableForeignKeys();
        \DB::table('products')->truncate('products');

        $products = [
            [
                'title'      => 'Chipiu mare',
                'price'      => '126',
                'image'      => 'http://tricou.md/image/cache/data/images_product/Hanorace/cu-gluga/3/3-500x500_0.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'      => 'THE QUEEN OF MY FAMILY',
                'price'      => '350',
                'image'      => 'http://tricou.md/image/cache/data/images_product/Hanorace/cu-gluga/3/3-500x500_0.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'      => 'IMI IUBESC NEVASTA',
                'price'      => '160',
                'image'      => 'http://tricou.md/image/cache/data/images_product/Barbati/Tricouri/3/252-500x500_0.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'      => 'Chipiu mare',
                'price'      => '126',
                'image'      => 'http://tricou.md/image/cache/data/images_product/Hanorace/cu-gluga/3/3-500x500_0.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'      => 'Chipiu mare',
                'price'      => '126',
                'image'      => 'http://tricou.md/image/cache/data/images_product/Hanorace/cu-gluga/3/3-500x500_0.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'      => 'Chipiu mare',
                'price'      => '126',
                'image'      => 'http://tricou.md/image/cache/data/images_product/Hanorace/cu-gluga/3/3-500x500_0.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        \DB::table('products')->insert($products);

        //\DB::table('products')->enableForeignKeys();
    }
}
