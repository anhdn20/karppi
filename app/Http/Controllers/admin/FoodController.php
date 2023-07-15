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
use mysql_xdevapi\Exception;
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
                'food_name' => 'required|max:100',
                'food_category_id' => 'required|numeric|max:1000',
                'price' => 'required|numeric|max:1000000',
                'description' => 'max:1000',
            ],[
                'food_name.required' => 'Chưa nhập tên món ăn',
                'food_name.max' => 'Tên món anhw không được nhập dài quá 100 kí tự',
                'food_category_id.required' => 'Chưa chọn danh mục món',
                'price.numeric' => 'Không được nhập chữ ở giá',
                'price.max' => 'Giá quá lớn',
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }

            // chuẩn bị data insert bảng product
            $data = [
                'category_id' => $params['food_category_id'],
                'name' => $params['food_name'],
                'price' => $params['price'],
                'description' => $params['description']
            ];
            $result = Food::create($data);
            if (!$result) {
                throw new \Exception('Thêm món ăn thất bại');
            }
            return $outputSuccess;
        } catch (Exception $e) {
            return ['status' => 1,'mess' => $e->getMessage()];
        }
    }

}
