<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodMenu;
use App\Models\Gallery;
use App\Models\Image;

class homeController extends Controller
{

    public function home(Request $r)
    {
        // lấy tất cả các banner liên quan của trang home
        $bannerHead = Image::getAllByType('BANNER_HOME_HEAD');
        $bannerSection1 = Image::getAllByType('BANNER_HOME_SECTION_1');
        $bannerSection2 = Image::getAllByType('BANNER_HOME_SECTION_2');
        $bannerSection3 = Image::getAllByType('BANNER_HOME_SECTION_3');


        return view('site.home',compact(
            'bannerHead',
            'bannerSection1',
            'bannerSection2',
            'bannerSection3'
        ));
    }

    public function about(Request $r)
    {
        return view('site.about');
    }

    public function menu(Request $r)
    {

        $bannerMenu = Image::getAllByType('BANNER_MENU_SECTION');

        // lấy food menu hiện tại
        $currentMenu = FoodMenu::where('is_active',1)->first();

        // lấy danh mục thực đơn theo danh mục hiện tại
        // $categoryByCurrentMenu = FoodCategory::


        return view('site.menu',compact('currentMenu','bannerMenu'));
    }

    public function gallery(Request $r)
    {
        // lấy danh sách gallery
        $gallery = Gallery::where('is_deleted',0)->orderBy('priority','DESC')->get();

        return view('site.gallery',compact('gallery'));
    }

}
