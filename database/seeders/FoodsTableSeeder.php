<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

function create_image($name)
{
    $size_x = 300;
    $size_y = 300;
    $partitions = 3;

    $img = Image::canvas($size_x, $size_y);
    for ($rows = 0; $rows < $partitions; $rows++) {
        for ($cols = 0; $cols < $partitions; $cols++) {
            $r = rand(0, 255);
            $g = rand(0, 255);
            $b = rand(0, 255);
            // for ($y = $rows * ($size_y / $partitions); $y < ($rows + 1) * ($size_y / $partitions); $y++) {
            //     for ($x = $cols * ($size_x / $partitions); $x < ($cols + 1) * ($size_x / $partitions); $x++) {
            //         $img->pixel(array($r, $g, $b), $x, $y);
            //     }
            // }

            $img->rectangle(
                $rows * ($size_y / $partitions),
                $cols * ($size_x / $partitions),
                ($rows + 1) * ($size_y / $partitions),
                ($cols + 1) * ($size_x / $partitions),
                function ($draw) use ($r, $g, $b) {
                    $draw->background(array($r, $g, $b));
                }
            );
        }
    }
    $img->save(storage_path("app/public/images/$name.jpg"));
}

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
        $foods = [];

        for ($i = 1; $i <= 50; $i++) {
            create_image($i);

            $foods[] = [
                'name' => Str::random(5),
                'image_name' => "$i.jpg",
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
