<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    protected $table = 'food_menu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'description', 'is_active', 'is_deleted', 'image_url'
    ];

    public function getList()
    {
        return self::where('is_deleted', 0)->get();
    }


}
