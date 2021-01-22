<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recalculation extends Model
{
    use HasFactory;

    protected $table ='recalculations';

    protected $fillable = ['kolichestvo','ostatok'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
