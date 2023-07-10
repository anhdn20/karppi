<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Image;
use App\Models\MyList;
use App\Models\MyListShare;
use App\Models\Product;
use App\Models\Season;
use App\Models\Studio;
use App\Models\Tour;
use App\Models\Trailer;
use App\Models\UserRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    public function search(Request $r){
        $params = $r->all(); //dang array
        if(isset($params['searchTerm'])){
            $products = Tour::where('title_'.$r->lang.'', 'like', '%'.$params['searchTerm'].'%')->where('is_deleted',0)->limit(10)
                ->get(['id','title_'.$r->lang.' as title','image','slug']);
            return response()->json($products);
        }
    }

    public function list(Request $r)
    {

        $params = $r->all(); //dang array

        // lấy thông tin danh mục
        $data['categories'] = Category::getAllTour($r->lang);

        if($params['keysearch'] != null){

            $language = $r->lang;

            // lấy banner
            $banner_blog = Image::getAllByType($r->lang,'BANNER_BLOG');

            $keySearch = $params['keysearch'];
            $tours = Tour::getByKeySearch($r->lang,$keySearch);

            $posts = Blog::getByKeySearch($r->lang,$keySearch);

            // dd($tours,$posts);

            return view('site.search',['tours' => $tours, 'posts' => $posts, 'banner_blog' => $banner_blog, 'language' => $language]);
        }

        return view('site.search',['data' => $data]);



    }
}
