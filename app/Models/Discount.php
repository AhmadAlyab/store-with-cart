<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['value','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
