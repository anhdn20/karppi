<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    protected $table = 'food_category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'description', 'is_deleted', 'image_url', 'menu_id'
    ];

    public function getlist()
    {
        return self::where('is_deleted', 0)->get();
    }

}
