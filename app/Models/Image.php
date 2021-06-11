<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function product()
    {
        return $this->hasOne(Products::class);
    }
}
