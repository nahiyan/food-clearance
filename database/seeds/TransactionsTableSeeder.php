<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array which will be used for the insertion
        $transactions = [

        ];

        for ($i = 1; $i <= 300; $i++) {
            $transactions[] = [
                'price' => rand(1, 1000),
                'quantity' => rand(1, 100),
                'user_id' => rand(1, 11),
                'food_id' => rand(1, 6),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }

        DB::table('transactions')->insert($transactions);
    }
}
