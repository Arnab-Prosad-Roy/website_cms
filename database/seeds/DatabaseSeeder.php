<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        factory(App\User::class, 1)->create();
        $this->call(CategoryHeadSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SiteSettingSeeder::class);
    }
}
