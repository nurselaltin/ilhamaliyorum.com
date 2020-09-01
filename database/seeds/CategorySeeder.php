<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['YAZILIM','YAŞAM','SAĞLIK','GENEL'];

        foreach ($categories as $category){
            DB::table('categories')->insert([
                 'title'     => $category,
                 'is_active'  => 1,
            ]);
        }

    }
}
