<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Channel;
use App\Models\Season;
use App\Models\Studio;
use App\Models\Tag;
use App\Models\User;
use DataTables;

class adminController extends Controller{

    public function login(Request $r){
        // lấy thông tin email để kiểm tra password
        $params = $r->all();
        $detail = User::where('email',$params['email'] ?? '')->first();

        // nếu ko có thông tin trở về login
        if($detail == null){
            return redirect()->back()->with('status','Thông tin đăng nhập không chính xác');
        }

        // ko đúng mật khẩu thì về login
        if(md5($params['password']) != $detail->password || $detail->role != 1){
            return redirect()->back()->with('status','Thông tin đăng nhập không chính xác');
        }

        // lưu thông tin session
        $r->session()->put('user_id',$detail->id);

        return redirect('/cludmed/admin');


    }

    public function home(){
        return view('admin.dashboard');
    }
    public function season(){
        return view('admin.season');
    }
    public function tour(){
        $categories = Category::where('type', 0)->where('is_deleted', 0)->get();
        $tabs = Category::where('type', 2)->where('is_deleted', 0)->get();

        return view('admin.tour',compact('categories','tabs'));
    }
    public function blog(){
        $categories = Category::where('is_deleted', 0)->where('type',1)->get();
        return view('admin.blog', compact('categories'));
    }
    public function user(){
        return view('admin.user');
    }

    public function categoryTour(){
        $categories = Category::where('parent', 0)->where('type', 0)->where('is_deleted', 0)->get();
        return view('admin.category_tour', compact('categories'));
    }

    public function categoryBlog(){
        $categories = Category::where('parent', 0)->where('type', 1)->where('is_deleted', 0)->get();
        return view('admin.category_blog', compact('categories'));
    }

    public function channel(){
        return view('admin.channel');
    }

    public function banner(){
        return view('admin.banner');
    }

    public function actor(){
        return view('admin.actor');
    }

    public function color(){
        return view('admin.color');
    }

    public function tag(){
        return view('admin.tag');
    }
    public function review(){
        return view('admin.review');
    }



}