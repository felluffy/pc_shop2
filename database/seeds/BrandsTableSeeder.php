<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'Nvidia'
        ]);
        Brand::create([
            'name' => 'Intel'
        ]);
        Brand::create([
            'name' => 'AMD'
        ]);
        Brand::create([
            'name' => 'GSKill'
        ]);
        Brand::create([
            'name' => 'IRONFIST'
        ]);
        Brand::create([
            'name' => 'Cougar'
        ]);
        Brand::create([
            'name' => 'Razer'
        ]);
        Brand::create([
            'name' => 'Logitech'
        ]);
        Brand::create([
            'name' => 'Toshiba'
        ]);
        Brand::create([
            'name' => 'Canon'
        ]);
    }
}
