<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    protected $table = 'food_menu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'description'
    ];


}
