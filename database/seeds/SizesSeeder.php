<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sizes')->truncate('sizes');

        $sizes = [
            [
                'size'       => 'XS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'size'       => 'S',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'size'       => 'M',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'size'       => 'L',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'size'       => 'XL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'size'       => 'XXL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'size'       => '3XL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        \DB::table('sizes')->insert($sizes);
    }
}
