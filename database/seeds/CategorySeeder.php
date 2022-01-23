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
        $admin =  DB::table('users')->first();
        
        $categoryHead =  DB::table('category_heads')->where('slug','blog')->first();
        DB::table('categories')->insert([
            'user_id' => $admin->id,
            'category_head_id' =>  $categoryHead->id,
            'name' => 'Blog',
            'slug' => 'default-blog',
            'status' => 1,
        ]);
     
        $categoryHead =  DB::table('category_heads')->where('slug','event')->first();
        DB::table('categories')->insert([
            'user_id' => $admin->id,
            'category_head_id' =>  $categoryHead->id,
            'name' => 'Event',
            'slug' => 'default-event',
            'status' => 1,
        ]);

    
        $categoryHead =  DB::table('category_heads')->where('slug','achievement')->first();
        DB::table('categories')->insert([
            'user_id' => $admin->id,
            'category_head_id' =>  $categoryHead->id,
            'name' => 'Achievement',
            'slug' => 'default-achievement',
            'status' => 1,
        ]);


        $categoryHead =  DB::table('category_heads')->where('slug','image-gallery')->first();
        DB::table('categories')->insert([
            'user_id' => $admin->id,
            'category_head_id' =>  $categoryHead->id,
            'name' => 'Image Gallery',
            'slug' => 'default-image-gallery',
            'status' => 1,
        ]);


        $categoryHead =  DB::table('category_heads')->where('slug','faq')->first();
        DB::table('categories')->insert([
            'user_id' => $admin->id,
            'category_head_id' =>  $categoryHead->id,
            'name' => 'FAQ',
            'slug' => 'default-faq',
            'status' => 1,
        ]);

         // end of category head



    }
}
