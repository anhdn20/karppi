<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use App\Models\tourGallery;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MenuController extends Controller
{

    public function detail(Request $r){
        $params = $r->all(); //dang array

        // product detail
        $data['detail'] = Tour::find($params['id']);
        $data['detail']->des_tab1_vi = html_entity_decode($data['detail']->des_tab1_vi);
        $data['detail']->des_tab1_en = html_entity_decode($data['detail']->des_tab1_en);
        $data['detail']->des_tab2_vi = html_entity_decode($data['detail']->des_tab2_vi);
        $data['detail']->des_tab2_en = html_entity_decode($data['detail']->des_tab2_en);
        $data['detail']->des_tab3_vi = html_entity_decode($data['detail']->des_tab3_vi);
        $data['detail']->des_tab3_en = html_entity_decode($data['detail']->des_tab3_en);
        $data['detail']->des_tab4_vi = html_entity_decode($data['detail']->des_tab4_vi);
        $data['detail']->des_tab4_en = html_entity_decode($data['detail']->des_tab4_en);
        $data['detail']->offer_vi = html_entity_decode($data['detail']->offer_vi);
        $data['detail']->offer_en = html_entity_decode($data['detail']->offer_en);

        // lấy gallery
        $data['galleries'] = tourGallery::where('id_tour',$params['id'])->get()->toArray();

        return ['status' => 0, 'data' => $data] ;
    }

    public function list(){
        $list = Tour::where('is_deleted', 0)->orderBy('id','DESC')->get();
            return Datatables::of($list)
                ->editColumn('image', function ($row) {
                    $pathUpload = '';
                    $html = 'Không tìm thấy';
                    if($row->image != '' && $row->image != null){
                        $pathUpload = asset('uploads/').'/'.$row->image;
                        $html = '<img src="'.$pathUpload.'" alt="'.$row->title_vi.'" style="max-width:110px;">';
                    }
                    return $html;
                })
                ->editColumn('id_category', function ($row) {
                    $detail = Category::find($row->id_category);
                    return '<span class="badge badge-success">'.$detail->title_vi.'</span>';
                })
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<td>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" data-toggle="modal" data-target="#modal-lg" data-id="'.$row->id.'" class="btn update btn-block bg-gradient-warning">Sửa</button>
                                    </div>
                                    <div class="col-6">
                                            <button type="button" data-id="'.$row->id.'" class="btn btn-block bg-gradient-danger del">Xóa</button>
                                    </div>
                                </div>
                            </td>';
                    return $btn;

                })
                ->rawColumns(['action','image','id_category'])

                ->make(true);
    }

    public function store(Request $r){
        $params = $r->all(); //dang array

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

    public function delete(Request $r){
        $params = $r->all(); //dang array
        try {
            $tourId = $params['id'];
            // rev khỏi database
            $exec = Tour::find($tourId)->delete();

            return ['status' => 0];
        } catch (\Throwable $th) {
            return ['status' => 1,'mess' => $th];
        }
    }

    public function deleteGallery(Request $r){
        $params = $r->all(); //dang array
        try {
            // rev khỏi database
            $exec = tourGallery::find($params['id'])->delete();
            return ['status' => 0];
        } catch (\Throwable $th) {
            dd($th);
            return ['status' => 1,'mess' => $th];
        }
    }
}
