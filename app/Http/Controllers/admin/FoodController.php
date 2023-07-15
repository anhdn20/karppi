<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Tour;
use App\Models\tourGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class FoodController extends Controller
{
    public function list(){
        $foodModel = new Food();
        $foods = $foodModel->getList();
        return Datatables::of($foods)
            ->editColumn('category_name', function ($row) {
                return '<span class="badge badge-success">'.$row->category_name.'</span>';
            })
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '<td>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" data-toggle="modal" data-target="#modal-lg" data-id="'.$row->id.'" class="btn update btn-block bg-gradient-warning">Sửa</button>
                                    </div>
                                    <div class="col-6">
                                            <button type="button" data-id="'.$row->id.'" class="btn btn-block bg-gradient-danger del">Xóa</button>
                                    </div>
                                </div>
                            </td>';

            })
            ->rawColumns(['action','category_name'])
            ->make(true);
    }
    public function create(Request $r){
        $params = $r->all();

        try {

            $outputSuccess = ['status' => 0,'mess' => 'Thành công'];

            // validation
            $validator = Validator::make($params, [
                'title_vi' => 'required|max:100|unique:tour,title_vi,'.$params['id'],
                'title_en' => 'required|max:100|unique:tour,title_en,'.$params['id'],
                'sub_title_vi' => 'max:100',
                'sub_title_en' => 'max:100',
                'title_tab1_vi' => 'max:200',
                'title_tab1_en' => 'max:200',
                'categoryId' => 'required',
                'price' => 'required|numeric',
                'pricefix' => 'numeric',
                'tab' => 'required',
                'tag' => 'required',
                'video1' => 'required',
                'video360' => 'required'
            ],[
                'title_vi.required' => 'Chưa nhập thông tin tour',
                'title_vi.unique' => 'Trùng thông tin tour',
                'title_vi.max' => 'Tên tour không được nhập dài quá 100 kí tự',
                'title_en.required' => 'Chưa nhập thông tin tour',
                'title_en.unique' => 'Trùng thông tin tour',
                'title_en.max' => 'Tên tour không được nhập dài quá 100 kí tự',
                'sub_title_vi.max' => 'Mô tả ngắn tour không được nhập dài quá 100 kí tự',
                'sub_title_en.max' => '<ô tả ngắn tour không được nhập dài quá 100 kí tự',
                'title_tab1_vi.max' => 'Tiêu đề tab mô tả không được nhập dài quá 200 kí tự',
                'title_tab1_en.max' => 'Tiêu đề tab mô tả không được nhập dài quá 200 kí tự',
                'price.numeric' => 'Không được nhập chữ ở giá',
                'pricefix.numeric' => 'Không được nhập chữ ở giá',
                'video1.required' => 'Chưa nhập thông video',
                'video360.required' => 'Chưa nhập thông tin video 360'
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }

            // chuẩn bị data insert bảng product
            $data = [
                'title_vi' => $params['title_vi'],
                'title_en' => $params['title_en'],
                'slug' => Str::slug($params['title_vi']),
                'id_category' => $params['categoryId'],
                'price' => $params['price'],
                'tab' => $params['tab'],
                'tag' => $params['tag'],
                'video1' => $params['video1'],
                'video360' => $params['video360'],
                'offer_vi' => htmlentities($params['offer_vi']),
                'offer_en' => htmlentities($params['offer_en']),
                'sub_title_vi' => $params['sub_title_vi'],
                'sub_title_en' => $params['sub_title_en'],
                'title_tab1_vi' => $params['title_tab1_vi'],
                'title_tab1_en' => $params['title_tab1_en'],
                'video2' => $params['video2'],
                'des_tab1_vi' => htmlentities($params['des_tab1_vi']),
                'des_tab1_en' => htmlentities($params['des_tab1_en']),
                'des_tab2_vi' => htmlentities($params['des_tab2_vi']),
                'des_tab2_en' => htmlentities($params['des_tab2_en']),
                'des_tab3_vi' => htmlentities($params['des_tab3_vi']),
                'des_tab3_en' => htmlentities($params['des_tab3_en']),
                'des_tab4_vi' => htmlentities($params['des_tab4_vi']),
                'des_tab4_en' => htmlentities($params['des_tab4_en'])
            ];

            if(isset($params['pricefix'])){
                $data['price_discount'] = $params['pricefix'];
            }

            if(isset($params['image']) && $params['image'] != ''){
                $data['image'] = $params['image'];
                $outputSuccess['type'] = 'reload';
            }

            if(isset($params['image1']) && $params['image1'] != ''){
                $data['image1'] = $params['image1'];
                $outputSuccess['type'] = 'reload';
            }

            if(isset($params['image2']) && $params['image2'] != ''){
                $data['image2'] = $params['image2'];
                $outputSuccess['type'] = 'reload';
            }

            if(isset($params['pdf']) && $params['pdf'] != ''){
                $data['pdf'] = $params['pdf'];
                $outputSuccess['type'] = 'reload';
            }

            if(isset($params['video1']) && $params['video1'] != ''){
                //cắt chuỗi để lấy id video
                $parts = parse_url($params['video1']);
                parse_str($parts['query'], $query);
                // format định dạng để lấy ảnh
                $id = $query['v'] ?? '';
                $urlImageYoutube = 'http://i3.ytimg.com/vi/'.$id.'/hqdefault.jpg';
                $data['imgvideo1'] = $urlImageYoutube;
            }

            if(isset($params['video2']) && $params['video2'] != ''){
                //cắt chuỗi để lấy id video
                $parts = parse_url($params['video2']);
                parse_str($parts['query'], $query);
                // format định dạng để lấy ảnh
                $id = $query['v'] ?? '';
                $urlImageYoutube = 'http://i3.ytimg.com/vi/'.$id.'/hqdefault.jpg';
                $data['imgvideo2'] = $urlImageYoutube;
            }

            if(isset($params['video360']) && $params['video360'] != ''){
                //cắt chuỗi để lấy id video
                $parts = parse_url($params['video360']);
                parse_str($parts['query'], $query);
                // format định dạng để lấy ảnh
                $id = $query['v'] ?? '';
                $urlImageYoutube = 'http://i3.ytimg.com/vi/'.$id.'/hqdefault.jpg';
                $data['imgvideo360'] = $urlImageYoutube;
            }

            DB::beginTransaction();

            // kiểm tra nếu nó có ID thì sẽ update
            if(isset($params['id']) && $params['id'] != 'undefined' && $params['action'] == 'update'){
                // update vào database

                Tour::where('id',$params['id'])->update($data);

                if(isset($params['gallery']) && $params['gallery'] != ''){
                    $arr = explode(',',$params['gallery']);
                    foreach ($arr as $value) {
                        tourGallery::create(
                            [
                                'path' => $value,
                                'id_tour' => $params['id']
                            ]
                        );
                    }
                    $outputSuccess['type'] = 'reload';
                }

                DB::commit();
                return $outputSuccess;
            }

            // add vào database
            $detail = Tour::create($data);

            if(isset($params['gallery']) && $params['gallery'] != ''){
                $arr = explode(',',$params['gallery']);
                foreach ($arr as $value) {
                    tourGallery::create(
                        [
                            'path' => $value,
                            'id_tour' => $detail->id
                        ]
                    );
                }
                $outputSuccess['type'] = 'reload';
            }

            DB::commit();

            return $outputSuccess;
        } catch (\Throwable $th) {
            dd($th);
            return ['status' => 1,'mess' => json_encode($th)];
        }
    }

}
