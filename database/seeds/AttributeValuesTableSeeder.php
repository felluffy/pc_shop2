<?php

use Illuminate\Database\Seeder;
use App\Models\AttributeValue;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['small', 'medium', 'large'];
        $colors = ['black', 'blue', 'red', 'orange'];
        $models = ['2ghz', '3ghz', '4ghz'];
        $capacities = ['1gb', '2gb', '4gb', '8gb', '16gb', '32gb', '64gb', '128gb', '256gb', '250gb', '512gb', '1tb', '2tb'];
        $interfaces = ['m.2', 'pcie', 'sata', 'blabla'];

        foreach ($sizes as $size)
        {
            AttributeValue::create([
                'attribute_id'      =>  1,
                'value'             =>  $size,
                'price'             =>  null,
            ]);
        }

        foreach ($colors as $color)
        {
            AttributeValue::create([
                'attribute_id'      =>  2,
                'value'             =>  $color,
                'price'             =>  null,
            ]);
        }

        foreach ($models as $model)
        {
            AttributeValue::create([
                'attribute_id'      =>  2,
                'value'             =>  $model,
                'price'             =>  null,
            ]);
        }

        foreach ($interfaces as $interface)
        {
            AttributeValue::create([
                'attribute_id'      =>  2,
                'value'             =>  $interface,
                'price'             =>  null,
            ]);
        }

        foreach ($capacities as $capacity)
        {
            AttributeValue::create([
                'attribute_id'      =>  2,
                'value'             =>  $capacity,
                'price'             =>  null,
            ]);
        }
    }
}
