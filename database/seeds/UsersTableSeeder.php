<?php

use App\Models\User;
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
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'test@gmail.com',
            'address' => 'test',
            'city' => 'test',
            'state' => 'test',
            'country' => 'Test',
            'post_code' => '1421532',
            'phone_number' => 'test',
            'password' => bcrypt('password'),
        ]);
        factory('App\Models\User', 10)->create();
    }
}
