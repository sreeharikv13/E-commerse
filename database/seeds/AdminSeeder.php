<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        Admin::create([
            'name' => 'Adam',
            'username' => 'john',
            'password' => bcrypt('qwerty'),

        ]);
    }
}
