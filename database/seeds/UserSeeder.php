<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();
        \DB::table('users')->insert(
          [
              [
                  'name' => 'Narayan Sharma',
                  'email' => 'email@gmail.com',
                  'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                  'remember_token' => str_random(10),
              ]
          ]
        );
    }
}
