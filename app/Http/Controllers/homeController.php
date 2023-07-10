<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
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
        return view('site.menu');
    }

}
