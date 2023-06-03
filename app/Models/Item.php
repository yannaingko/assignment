<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class,'type_id');
    }
}
