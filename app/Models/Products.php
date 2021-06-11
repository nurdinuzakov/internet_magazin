<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $table = 'products';

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
}
