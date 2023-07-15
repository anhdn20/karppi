<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\FoodCategory;
use App\Models\FoodMenu;
use App\Models\Image;
use App\Models\review;
use App\Models\Tour;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class homeController extends Controller
{

    public function home(Request $r)
    {

        return view('site.home');
    }

    public function about(Request $r)
    {
        return view('site.about');
    }

    public function menu(Request $r)
    {

        // lấy food menu hiện tại
        $currentMenu = FoodMenu::where('is_active',1)->first();

        // lấy danh mục thực đơn theo danh mục hiện tại
        // $categoryByCurrentMenu = FoodCategory::


        return view('site.menu',compact('currentMenu'));
    }

    public function gallery(Request $r)
    {
        return view('site.gallery');
    }

}
