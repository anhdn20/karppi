<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id', 'name', 'description', 'price', 'is_deleted',
    ];

    public function getList()
    {
        return self::select('food.name', 'food.description', 'food.price', 'C.name as category_name')
            ->join('food_category as C', 'food.category_id', 'C.id')
            ->where('food.is_deleted', 0)
            ->orderBy('food.updated_at')
            ->get();
    }


}
