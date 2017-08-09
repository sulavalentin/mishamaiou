<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HonorocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('honorocs')->truncate('honorocs');

        $products = [
            [
                'title'     => 'Hanorac cu Gluga',
                'price'     => 0,
                'image'     =>'gluga-curat.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'     => 'Hanorac fără Gluga',
                'price'     => -30,
                'image'     =>'fara-gluga.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'     => 'Hanorac cu Gluga si fermoar',
                'price'     => 30,
                'image'     =>'cu-fermoar-curat.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        \DB::table('honorocs')->insert($products);
    }
}
