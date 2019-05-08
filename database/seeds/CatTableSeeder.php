<?php

use Illuminate\Database\Seeder;

class CatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Strawberry', 'Raspberry', 'Cranberry', 'BlueBerry', 'BlackBerry'];
        foreach($categories as $category){
            App\Category::firstOrCreate(['name'=>$category]);
        }
    }
}
