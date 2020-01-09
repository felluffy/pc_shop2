<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          =>  'Root',
            'description'   =>  'Root category',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'Desktops',
            'description'   =>  'Duis dolore ex magna laboris pariatur proident id.',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Laptops',
            'description'   =>  'Velit labore incididunt do nulla est sunt cillum.',
            'parent_id'     =>  1,
            'menu'          =>  1,

        ]);
        Category::create([
            'name'          =>  'Components',
            'description'   =>  'Pariatur nostrud velit cillum minim proident velit duis est enim.',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Gaming',
            'description'   =>  'Eu nulla magna excepteur in minim cupidatat amet reprehenderit proident.',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Networking',
            'description'   =>  'Commodo Lorem adipisicing quis esse exercitation in ad adipisicing cupidatat veniam sit ullamco.',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);

        Category::create([
            'name'          =>  'Gaming PC',
            'description'   =>  'Qui incididunt ea officia commodo culpa nisi culpa et.',
            'parent_id'     =>  2,
            'menu'          =>  0,
            'featured'      =>  1,
        ]);
        Category::create([
            'name'          =>  'Brand PC',
            'description'   =>  'Magna nostrud et dolor in in.',
            'parent_id'     =>  2,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'Nuc PC',
            'description'   =>  'Ea irure dolore exercitation id aliquip sit et voluptate commodo nostrud eiusmod sunt.',
            'parent_id'     =>  2,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'Compact PC',
            'description'   =>  'Ea eu elit nisi consectetur laboris.',
            'parent_id'     =>  2,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'Ultrabooks',
            'description'   =>  'Mollit proident veniam id ad fugiat aliqua.',
            'parent_id'     =>  3,
            'menu'          =>  0,
            'featured'      =>  1,
        ]);
        Category::create([
            'name'          =>  'Gaming Notebooks',
            'description'   =>  'Cillum exercitation culpa eu nulla fugiat id labore ullamco.',
            'parent_id'     =>  3,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'GPU',
            'description'   =>  'Aute eu fugiat sit ut et dolor minim quis esse amet elit aute nisi.',
            'parent_id'     =>  4,
            'menu'          =>  0,
            'featured'      =>  1,
        ]);
        Category::create([
            'name'          =>  'CPU',
            'description'   =>  'Consectetur enim officia anim labore magna.',
            'parent_id'     =>  4,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'RAM',
            'description'   =>  'Ea tempor fugiat ut adipisicing culpa ut officia do.',
            'parent_id'     =>  4,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'PSU',
            'description'   =>  'Tempor nisi ut ex irure Lorem sunt eu quis et.',
            'parent_id'     =>  4,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'CASING',
            'description'   =>  'Incididunt officia Lorem nulla quis ullamco Lorem commodo nulla laboris.',
            'parent_id'     =>  4,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'Peripherals',
            'description'   =>  'Amet nostrud consectetur elit eiusmod cupidatat sunt.',
            'parent_id'     =>  5,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'Routers',
            'description'   =>  'Voluptate magna ipsum veniam nisi veniam voluptate consequat cupidatat commodo consequat amet pariatur.',
            'parent_id'     =>  6,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'Switches',
            'description'   =>  'Consectetur incididunt cillum enim qui fugiat consectetur commodo adipisicing anim minim aute ut et ex.',
            'parent_id'     =>  6,
            'menu'          =>  0,
        ]);




        //factory('App\Models\Category', 10)->create();
        
    }
}