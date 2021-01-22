<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    const INCOME = 1;
    const OUTGO = 2;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
