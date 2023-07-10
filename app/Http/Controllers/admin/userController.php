<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Studio;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{

    public function detail(Request $r){
        $params = $r->all(); //dang array
        return ['status' => 0, 'data' => User::find($params['id'])];
    }

    public function list(){
        $list = User::orderBy('id','DESC')->get();
        return Datatables::of($list)
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
                'email' => 'required|email:rfc,dns|max:200|unique:user,email,'.$params['id'],
                'name' => 'required|max:200',
                'password' => 'required_if:action,create',
            ],[
                'email.required' => 'Chưa nhập thông tin Email',
                'email.email' => 'Chưa đúng định dạng',
                'email.unique' => 'Trùng thông tin Email',
                'email.max' => 'không được nhập dài quá 200 kí tự',
                'name.required' => 'Chưa nhập thông tin Tên người dùng',
                'name.max' => 'không được nhập dài quá 200 kí tự',
                'password.required_if' => 'Chưa nhập thông tin Mật khẩu'
            ]
            );

            if($validator->fails()){
                // dd($validator->errors());
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }
            // chuẩn bị data
            $data = [
                'full_name' => $params['name'],
                'email' => $params['email']
            ];

            if(isset($params['password']) && $params['password'] != ''){
                $data['password'] = md5($params['password']);
            }

            // kiểm tra nếu nó có ID thì sẽ update
            if(isset($params['id']) && $params['id'] != 'undefined' && $params['action'] == 'update'){
                // update vào database
                User::where('id',$params['id'])->update($data);
                return ['status' => 0];
            }
            // add vào database
            User::create($data);

            return ['status' => 0,'mess' => $params];
        } catch (\Throwable $th) {
            dd($params,$th);
            return ['status' => 1,'mess' => $th];
        }
    }

    public function delete(Request $r){
        $params = $r->all(); //dang array
        try {
            // rev khỏi database
            $exec = User::find($params['id'])->delete();
            return ['status' => 0];
        } catch (\Throwable $th) {
            return ['status' => 1,'mess' => $th];
        }
    }
}
