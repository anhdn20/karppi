<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    protected $table = 'food_menu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'description', 'intro', 'is_active', 'is_deleted', 'image_url'
    ];

    public function getList()
    {
        //return self::select('food_menu.id', 'food_menu.name', 'food_menu.description', 'food_menu.image_url')
        return self::where('is_deleted', 0)->get();
    }


}
