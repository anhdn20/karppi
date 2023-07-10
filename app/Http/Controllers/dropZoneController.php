<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class dropZoneController extends Controller
{
    public function Updropzone(Request $request){
        // request file về
        $image = $request->file('file');
        // lấy tên gốc của file
        $fileName1 = $image->getClientOriginalName();

        $name_origin = preg_replace('/(\.)[a-zA-Z]{3,4}/','',$fileName1);
        // lấy tên theo ngày tháng năm
        $fileName1 = $name_origin . '_' . date('Y-m-d-H') . '.' . $image->extension();

        // chuyển file vào uploads
        $image->move(public_path('uploads'), $fileName1);

        // trả về file vừa upload
        return  $fileName1;
    }


    public function dropzoneDel(Request $request){
        // request file về
        $image = $request->name;

        $name_origin = preg_replace('/(\.)[a-zA-Z]{3,4}/','',$image);

        $tail = preg_match_all('/\.[a-zA-Z]{3,4}/',$image, $str);

        // kiểm tra xem có phải đuôi csv ko
        // nếu là csv thì thư viện sẽ chuyển sang txt

        if($str[0][count($str[0]) - 1] === '.csv'){

            $str[0][count($str[0]) - 1] = '.txt';

        }

        $fileName1 = $name_origin . '_' . date('Y-m-d-h') . $str[0][count($str[0]) - 1];

        // if($str[0][count($str[0]) - 1] === '')

        $image_path = public_path('uploads').'/'.$fileName1;
        // kiểm tra file
        if(File::exists($image_path)) {

            // File::delete($image_path);

        }

        return $fileName1;
    }
}
