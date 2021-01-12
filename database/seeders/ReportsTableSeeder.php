<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array which will be used for the insertion
        $reports = [];

        for ($i = 1; $i <= 50; $i++) {
            $type = null;
            $food_id = null;
            $company_id = null;

            if (random_int(0, 1) == 0) {
                $type = 'food';
                $food_id = rand(1, 6);
            } else {
                $type = 'company';
                $company_id = rand(1, 7);
            }

            $reports[] = [
                'type' => $type,
                'body' => "Lorem Ipsum",
                'user_id' => rand(1, 11),
                'food_id' => $food_id,
                'company_id' => $company_id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }

        DB::table('reports')->insert($reports);
    }
}
