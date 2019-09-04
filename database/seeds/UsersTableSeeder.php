<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'      =>  'Nishan Ahmed',
            'email'     =>  'md.nishanahmed14@gmail.com',
            'password'  =>  bcrypt('nishan1324'),
        ]);
    }
}
