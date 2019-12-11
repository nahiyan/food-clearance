<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array which will be used for the insertion
        $companies = [
            
        ];

        for ($i = 0; $i <= 5; $i++) {
            $companies[] = [
                'name' => Str::random(5),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }

        DB::table('companies')->insert($companies);
    }
}
