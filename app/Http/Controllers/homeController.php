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

        // $url = "https://maps.googleapis.com/maps/api/place/details/json?key=AIzaSyDqakaSzRssTN9CsKye9NEqEdk-Jfg33PU&placeid=ChIJf3osgOCEyDERFohUIY5TdKw";
        // // $url = 'https://mybusiness.googleapis.com/v4/accounts';
        // $ch = curl_init();
        // curl_setopt ($ch, CURLOPT_URL, $url);
        // curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        // $result = curl_exec ($ch);
        // dd($result);
        // $res        = json_decode($result,true);
        // $reviews    = $res['result']['reviews'];

        // lấy thông tin danh mục
        $data['categories'] = Category::getAllTour($r->lang);

        // lấy banner
        $data['banner_home_head'] = Image::getAllByType($r->lang,'BANNER_HOME_HEAD');
        $data['banner_home_section'] = Image::getAllByType($r->lang,'BANNER_HOME_SECTION');

         // lấy thông tin bài viết
         $data['blogs_what'] = Blog::getByCategoryId($r->lang,9);

         $data['blogs_holiday'] = Blog::getByCategoryId($r->lang,10);

        //  lấy thông tin tour
        $data['tour_lastest'] = Tour::getByTabId($r->lang, 0);

        // lấy danh mục tab tour
        $tour_tab = DB::table('tour')->select('tab')->distinct()->where('tab','!=',0)->get();

        $formatGetTab = [];
        foreach ($tour_tab as $value) {
            // lấy thông tin tab
            $detail = Category::getDetailById($r->lang,$value->tab);
            $formatGetTab[] = $detail;
        }

        $data['tour_tab'] = $formatGetTab;


        return view('site.home',['data' => $data,'language' => $r->lang]);
    }

    public function contact(Request $r)
    {

        // lấy thông tin danh mục
        $data['categories'] = Category::getAllTour($r->lang);

        // lấy banner
        $data['banner_contact'] = Image::getAllByType($r->lang,'BANNER_CONTACT');

        return view('site.contact',['data' => $data]);
    }

    public function review(Request $r)
    {
        // lấy thông tin danh mục
        $data['categories'] = Category::getAllTour($r->lang);

        // lấy banner
        $data['banner_review'] = Image::getAllByType($r->lang,'BANNER_REVIEW');

        $data['reviews'] = review::getAll($r->lang);

        return view('site.review',['data' => $data]);
    }


    public function changeLanguage($language)
    {
        $url = dirname(url()->previous());

        Session::put('website_language', $language);

        if(in_array($url,['http:','https:'])){
            return redirect()->to('/');
        }

        // format lại url theo ngôn ngữ mới
        $url = $url.'/'.$language;

        return redirect()->to($url);
    }

    public function sendMail(Request $r){
        $input = $r->all();

        Mail::send('site.email', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['message']), function($message){
	        $message->to('daonhatanh630@gmail.com', 'Visitor')->subject('Thông tin tư vấn website Cludmed');
	    });

        $url = dirname(url()->previous());

        Session::put('website_language', $r->lang);

        if(in_array($url,['http:','https:'])){
            return redirect()->to('/');
        }

        // format lại url theo ngôn ngữ mới
        $url = $url.'/'.$r->lang;

        return redirect()->to($url)->with('send_mail_success', 'Thao tác thành công');
    }
}
