<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class galleryController extends Controller
{

    public function detail(Request $r){
        $params = $r->all(); //dang array
        return ['status' => 0, 'data' => Image::find($params['id'])];
    }

    public function list(){
        $list = Image::where('is_deleted', 0)->orderBy('id','DESC')->get();
            return Datatables::of($list)
                ->editColumn('image', function ($row) {
                    $pathUpload = '';
                    $html = 'Không tìm thấy';
                    if($row->image != '' && $row->image != null){
                        $pathUpload = asset('uploads/').'/'.$row->image;
                        $html = '<img src="'.$pathUpload.'" alt="'.$row->title.'" style="max-width:110px;">';
                    }
                    return $html;
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
                ->rawColumns(['action','image'])

                ->make(true);
    }

    public function store(Request $r){
        $params = $r->all(); //dang array
        try {
            // validation
            // validation
            $validator = Validator::make($params, [
                'title_vi' => 'required|max:200|unique:image,title_vi,'.$params['id'],
                'title_en' => 'required|max:200|unique:image,title_en,'.$params['id'],
                'type' => 'required|unique:image,type,'.$params['id']
            ],[
                'title_vi.required' => 'Chưa nhập thông tin tiêu đề hình ảnh',
                'title_vi.unique' => 'Trùng thông tin tiêu đề hình ảnh',
                'title_vi.max' => 'không được nhập dài quá 200 kí tự',
                'title_en.required' => 'Chưa nhập thông tin tiêu đề hình ảnh',
                'title_en.unique' => 'Trùng thông tin tiêu đề hình ảnh',
                'title_en.max' => 'không được nhập dài quá 200 kí tự',
                'type.unique' => 'Ảnh ở vị trí này đã được tạo',
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }
            // chuẩn bị data
            $data = [
                'title_vi' => $params['title_vi'],
                'title_en' => $params['title_en'],
                'type' => $params['type']
            ];

            if(isset($params['sub_title_vi']) && $params['sub_title_vi'] != ''){
                $data['sub_title_vi'] = $params['sub_title_vi'];
            }

            if(isset($params['sub_title_en']) && $params['sub_title_en'] != ''){
                $data['sub_title_en'] = $params['sub_title_en'];
            }

            if(isset($params['text_btn_vi']) && $params['text_btn_vi'] != ''){
                $data['text_btn_vi'] = $params['text_btn_vi'];
            }

            if(isset($params['text_btn_en']) && $params['text_btn_en'] != ''){
                $data['text_btn_en'] = $params['text_btn_en'];
            }

            if(isset($params['image']) && $params['image'] != ''){
                $data['image'] = $params['image'];
            }

            if(isset($params['url_direction']) && $params['url_direction'] != ''){
                $data['url_direction'] = $params['url_direction'];
            }

            // kiểm tra nếu nó có ID thì sẽ update
            if(isset($params['id']) && $params['id'] != 'undefined' && $params['action'] == 'update'){
                // update vào database
                Image::where('id',$params['id'])->update($data);
                return ['status' => 0];
            }
            // add vào database
            Image::create($data);

            return ['status' => 0,'mess' => $params];
        } catch (\Throwable $th) {
            return ['status' => 1,'mess' => $th];
        }
    }

    public function delete(Request $r){
        $params = $r->all(); //dang array
        try {
            // rev khỏi database
            $exec = Image::where('id', $params['id'])->delete();
            return ['status' => 0];
        } catch (\Throwable $th) {
            return ['status' => 1,'mess' => $th];
        }
    }
}
