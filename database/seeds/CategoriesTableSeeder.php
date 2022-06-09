<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['FPS', 'Action / RPG', 'Platform', 'Rythm Game'];
            foreach($categories as $category) {
                $new_category_object = new Category();
                $new_category_object->name = $category;
                $new_category_object->slug = Str::slug($category);
                $new_category_object->save();
            }
    }
}
