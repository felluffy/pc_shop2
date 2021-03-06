<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'      =>  'admin',
            'email'     =>  'somesiteadmin@admin.com',
            'password'  =>  bcrypt('admin'),
        ]);
    }
}
