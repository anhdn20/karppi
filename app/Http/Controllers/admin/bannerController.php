<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Image;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class bannerController extends Controller
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
            $outputSuccess = ['status' => 0,'mess' => 'Thành công'];
            // validation
            $validator = Validator::make($params, [
                'title' => 'max:200',
                'type' => 'unique:image,type,'.$params['id']
            ],[
                'title.max' => 'không được nhập dài quá 200 kí tự',
                'type.unique' => 'Vị trí này đã được thêm rồi'
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }
            // chuẩn bị data
            $data = [
                'title' => $params['title'],
                'type' => $params['type']
            ];

            if(isset($params['image']) && $params['image'] != ''){
                $data['image'] = $params['image'];
                $outputSuccess['type'] = 'reload';
            }

            if(isset($params['url_direction']) && $params['url_direction'] != ''){
                $data['url_direction'] = $params['url_direction'];
            }

            // kiểm tra nếu nó có ID thì sẽ update
            if(isset($params['id']) && $params['id'] != 'undefined' && $params['action'] == 'update'){
                // update vào database
                Image::where('id',$params['id'])->update($data);
                return $outputSuccess;
            }
            // add vào database
            Image::create($data);

            return $outputSuccess;
        } catch (\Throwable $th) {
            dd($th);
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
