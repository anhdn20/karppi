<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id', 'name', 'description', 'price', 'is_deleted', 'image_url'
    ];

    public function getList()
    {
        return self::select('food.id', 'food.image_url', 'food.name', 'food.description', 'food.price', 'C.name as category_name')
            ->leftJoin('food_category as C', 'food.category_id', 'C.id')
            ->where('food.is_deleted', 0)
            ->orderBy('food.updated_at')
            ->get();
    }

    public function getById($id)
    {
        return self::select('fname', 'food.description', 'food.price',)
            ->join('food_category as C', 'food.category_id', 'C.id')
            ->where('food.id', $id)
            ->where('food.is_deleted', 0)
            ->orderBy('food.updated_at')
            ->get();
    }


}
