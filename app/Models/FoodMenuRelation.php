<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodMenuRelation extends Model
{
    protected $table = 'food_menu_relation';
    protected $primaryKey = 'id';
    protected $fillable = [
        'food_group_id', 'menu_id'
    ];



}
