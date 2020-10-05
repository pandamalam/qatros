<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'item_code' => Str::random(12),
            'item_name' => Str::random(10),
            'item_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolorum, saepe deleniti dicta eligendi consectetur earum numquam quis iusto repellat ex architecto nulla at vel accusantium beatae quam maxime illum?',
        ]);
    }
}
