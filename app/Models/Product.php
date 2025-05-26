<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','profil_photo'];

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }
}
