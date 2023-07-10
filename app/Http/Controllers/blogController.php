<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class blogController extends Controller
{

    public function index(Request $r)
    {

        // lấy thông tin danh mục
        $data['categories'] = Category::getAllTour($r->lang);

        // lấy banner
        $data['banner_blog'] = Image::getAllByType($r->lang,'BANNER_BLOG');

        // lấy danh mục bài viết
        $categories = Category::getAllNotParent($r->lang);

        $data['categories_blog'] = $categories;

        return view('site.blog',['data' => $data, 'language' => $r->lang]);
    }

    public function detail(Request $r, $slug)
    {

        // lấy thông tin danh mục
        $data['categories'] = Category::getAllTour($r->lang);

        // lấy banner
        $data['banner_blog'] = Image::getAllByType($r->lang,'BANNER_BLOG');

        $data['detail'] = Blog::getDetailBySlug($r->lang,$slug);

        if($data['detail'] == null){
            abort(404);
        }

        return view('site.blog_detail',['data' => $data, 'language' => $r->lang]);
    }

}
