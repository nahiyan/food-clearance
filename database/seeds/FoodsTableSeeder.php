<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array which will be used for the insertion
        $foods = [

        ];

        for ($i = 0; $i <= 5; $i++) {
            $foods[] = [
                'name' => Str::random(5),
                'image_name' => 'test.jpg',
                'price' => rand(1, 1000),
                'quantity' => rand(1, 100),
                'company_id' => rand(1, 7),
                'expires_at' => Carbon::now()->add(rand(1, 10), "days")->format("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }

        DB::table('foods')->insert($foods);
    }
}
