<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Banner;
use App\Models\Channel;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class colorController extends Controller
{

    public function detail(Request $r){
        $params = $r->all(); //dang array
        return ['status' => 0, 'data' => Color::find($params['id'])];
    }

    public function list(){
        $list = Color::where('is_deleted', 0)->get();
            return Datatables::of($list)
                ->editColumn('name', function ($row) {
                    return $row->name ?? 'Không tìm thấy';
                })
                ->editColumn('color', function ($row) {
                    return $row->code ?? 'Không tìm thấy';
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
                ->rawColumns(['action'])

                ->make(true);
    }

    public function store(Request $r){
        $params = $r->all(); //dang array
        try {
            // validation
            $validator = Validator::make($params, [
                'name' => 'required|max:500',
                'code' => 'required|max:500',
            ],[
                'name.required' => 'Chưa nhập thông tin Tên',
                'name.max' => 'không được nhập dài quá 500 kí tự',
                'code.required' => 'Trùng thông tin Mô tả',
                'code.max' => 'không được nhập dài quá 500 kí tự',
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }
            // chuẩn bị data
            $data = [
                'name' => $params['name'],
                'code' => $params['code'],
            ];

            // kiểm tra nếu nó có ID thì sẽ update
            if(isset($params['id']) && $params['id'] != 'undefined' && $params['action'] == 'update'){
                // update vào database
                Color::where('id',$params['id'])->update($data);
                return ['status' => 0];
            }
            // add vào database
            Color::create($data);

            return ['status' => 0,'mess' => $params];
        } catch (\Throwable $th) {
            return ['status' => 1,'mess' => $th];
        }
    }

    public function delete(Request $r){
        $params = $r->all(); //dang array
        try {
            // rev khỏi database
            $exec = Color::where('id', $params['id'])->update([
                'is_deleted' => 1
            ]);
            return ['status' => 0];
        } catch (\Throwable $th) {
            return ['status' => 1,'mess' => $th];
        }
    }
}
