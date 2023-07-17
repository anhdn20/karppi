<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{

    public function list(){
        $list = Config::orderBy('id','DESC')->get();
            return Datatables::of($list)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<td>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" data-toggle="modal" data-target="#modal-lg" data-id="'.$row->id.'" class="btn update btn-block bg-gradient-warning">Sửa</button>
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
            // validation
            $validator = Validator::make($params, [
                'value' => 'required|max:500'
            ],[
                'value.required' => 'Chưa nhập thông tin tiêu đề hình ảnh',
                'value.max' => 'không được nhập dài quá 500 kí tự',
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }

            // chuẩn bị data
            $data = [
                'value' => $params['value'],
            ];


            // kiểm tra nếu nó có ID thì sẽ update
            if(isset($params['id']) && $params['id'] != 'undefined' && $params['action'] == 'update'){
                // update vào database
                Config::where('id',$params['id'])->update($data);
                return ['status' => 0];
            }
            // add vào database
            // Config::create($data);

            return ['status' => 0,'mess' => $params];
        } catch (\Throwable $th) {
            dd($th);
            return ['status' => 1,'mess' => $th];
        }
    }

    public function detail(Request $r){
        $params = $r->all(); //dang array
        $data = Config::find($params['id']);
        $data->value_vi = html_entity_decode($data->value_vi);
        $data->value_en = html_entity_decode($data->value_en);
        return ['status' => 0, 'data' => $data];
    }
}
