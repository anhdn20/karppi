<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;


class FoodController extends Controller
{
    public function listFood(){
        $foodModel = new Food();
        $foods = $foodModel->getList();
        return json_encode($foods);
    }
}
