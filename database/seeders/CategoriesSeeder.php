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
           'name' => 'Коты',
           'description' => 'Категория посвящена котам',
           'created_date' => now(),
           'updated_date' => now(),
           ]);


        DB::table('categories')->insert([
            'name' => 'Собаки',
            'description' => 'Категория посвящена собакам',
            'created_date' => now(),
            'updated_date' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Птицы',
            'description' => 'Категория посвящена птицам',
            'created_date' => now(),
            'updated_date' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Рыбы',
            'description' => 'Категория посвящена рыбам',
            'created_date' => now(),
            'updated_date' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Экзотические животные',
            'description' => 'Категория посвящена экзотическим животным',
            'created_date' => now(),
            'updated_date' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Сельскохозяйственные животные',
            'description' => 'Категория посвящена сельскохозяйственным животным',
            'created_date' => now(),
            'updated_date' => now(),
        ]);
    }
}
