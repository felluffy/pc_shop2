<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['name', 'logo'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
