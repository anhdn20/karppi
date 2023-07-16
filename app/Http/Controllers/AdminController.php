<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoodCategory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller{

    public function login(Request $r){
        // lấy thông tin email để kiểm tra password
        $params = $r->all();
        $detail = User::where('email',$params['email'] ?? '')->first();

        // nếu ko có thông tin trở về login
        if($detail == null){
            return redirect()->back()->with('status','Thông tin đăng nhập không chính xác');
        }

        // ko đúng mật khẩu thì về login
        if(md5($params['password']) != $detail->password){
            return redirect()->back()->with('status','Thông tin đăng nhập không chính xác');
        }

        // lưu thông tin session
        $r->session()->put('user_id',$detail->id);

        return redirect('/karppi/admin');


    }

    public function home(){
        return view('admin.dashboard');
    }
    public function season(){
        return view('admin.season');
    }

    public function food()
    {
        $foodCategories = FoodCategory::select('id', 'name')->where('is_deleted', 0)->get();

        return view('admin.food',compact('foodCategories'));
    }

    public function foodGroup()
    {
        return view('admin.foodGroup');
    }

    public function foodMenu()
    {
        return view('admin.foodMenu');
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

    public function banner(){
        return view('admin.banner');
    }

    public function gallery(){
        return view('admin.gallery');
    }



}
