<?php

use Illuminate\Database\Seeder;

class CategoryHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        
        // start category head
         DB::table('category_heads')->insert([
            'name' => 'Blog',
            'slug' => 'blog',
            'status' => 0,
        ]);
       
      
         DB::table('category_heads')->insert([
            'name' => 'Event',
            'slug' => 'event',
            'status' => 0,
        ]);
       

         DB::table('category_heads')->insert([
            'name' => 'Achievement',
            'slug' => 'achievement',
            'status' => 0,
        ]);
      

         DB::table('category_heads')->insert([
            'name' => 'Image Gallery',
            'slug' => 'image-gallery',
            'status' => 0,
        ]);
     

         DB::table('category_heads')->insert([
            'name' => 'FAQ',
            'slug' => 'faq',
            'status' => 0,
        ]);
        DB::table('category_heads')->insert([
            'name' => 'Question',
            'slug' => 'question',
            'status' => 0,
        ]);
         // end of category head
    }
}
