<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Image;
use App\Models\Tour;
use App\Models\tourGallery;
use Illuminate\Http\Request;

class tourController extends Controller
{

    public function index(Request $r,$slug)
            {
        // lấy thông tin danh mục
        $data['categories'] = Category::getAllTour($r->lang);

        // lấy chi tiết tour
        $data['detail'] = Tour::getDetailBySlug($r->lang, $slug);

        if($data['detail'] == null){
            abort(404);
        }

        // lấy gallery
        $data['galleries'] = tourGallery::where('id_tour',$data['detail']->id)->get();

        // lấy danh mục của tour
        $data['category'] = Category::getDetailById($r->lang,$data['detail']->id_category);

        // lấy bài viết liên quan
        $data['post_related'] = Blog::getRandom($r->lang);

        // lấy tour liên quan
        $data['tour_related'] = Tour::getListByIdCategory($r->lang,$data['detail']->id_category,4);

        return view('site.tourdetail',['data' => $data,'language' => $r->lang]);
    }

    public function list(Request $r)
    {

        // lấy thông tin danh mục
        $data['categories'] = Category::getAllTour($r->lang);

        // lấy banner
        $data['banner_blog'] = Image::getAllByType($r->lang,'BANNER_TOUR');


        // lấy danh mục bài viết
        $categories = Category::getAllNotParent($r->lang, 0);

        $data['categories_tour'] = $categories;

        return view('site.tour',['data' => $data, 'language' => $r->lang]);
    }

    public function listByCate(Request $r,$slug)
    {

        // lấy thông tin danh mục
        $data['categories'] = Category::getAllTour($r->lang);

        // lấy banner
        $data['banner_blog'] = Image::getAllByType($r->lang,'BANNER_TOUR');

        // get detail danh

        $cate = Category::where('slug',$slug)->first();

        if($cate == null) abort(404);

        $data['tour'] = Tour::getListByIdCategory($r->lang,$cate->id,100);
        if($cate->parent == 0){
            // lấy danh sách tour của các danh mục con
            $listCateChild = Category::where('parent',$cate->id)->get();

            foreach ($listCateChild as $value) {
                $data['tour'] = $data['tour']->merge(Tour::getListByIdCategory($r->lang,$value->id,100));
            }
        }
        // dd($data['tour']);

        return view('site.tourCate',['data' => $data, 'language' => $r->lang]);
    }

}
