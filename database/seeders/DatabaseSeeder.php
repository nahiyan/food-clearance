<?php

use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\CompaniesTableSeeder;
use Database\Seeders\FoodsTableSeeder;
use Database\Seeders\TransactionsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
    }
}
