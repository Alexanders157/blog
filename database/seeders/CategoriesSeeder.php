<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
           'title' => 'Коты',
           'description' => 'Категория посвящена котам',
           'created_at' => now(),
           'updated_at' => now(),
           ]);


        DB::table('categories')->insert([
            'title' => 'Собаки',
            'description' => 'Категория посвящена собакам',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'title' => 'Птицы',
            'description' => 'Категория посвящена птицам',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'title' => 'Рыбы',
            'description' => 'Категория посвящена рыбам',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'title' => 'Экзотические животные',
            'description' => 'Категория посвящена экзотическим животным',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'title' => 'Сельскохозяйственные животные',
            'description' => 'Категория посвящена сельскохозяйственным животным',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
