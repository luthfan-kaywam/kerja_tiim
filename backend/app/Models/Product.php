<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;

#[Fillable(['name', 'description', 'price', 'stock', 'category', 'image'])]
class Product extends Model
{
    protected function image(): Attribute
    {
        return Attribute::get(
            fn (?string $value) => $value ? url('storage/'.$value) : null,
        );
    }
}
