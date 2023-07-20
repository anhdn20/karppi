<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class FoodGroupController extends Controller
{
    public function list(){
        $category = new FoodCategory();
        $data = $category->getList();
        return Datatables::of($data)
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
    public function create(Request $r)
    {
        $params = $r->all();

        try {
            $outputSuccess = ['status' => 0,'mess' => 'Thành công'];

            // validation
            $validator = Validator::make($params, [
                'name' => 'required|max:100',
                'description' => 'max:1000',
                'menu_id' => 'numeric'
            ],[
                'name.required' => 'Chưa nhập tên',
                'name.max' => 'Tên món không được nhập dài quá 100 kí tự',
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }

            // chuẩn bị data insert bảng product
            $data = [
                'name' => $params['name'],
                'description' => $params['description'],
                'menu_id' => $params['menu_id'] ?? 0
            ];

            if ($params['action'] == 'create') {
                $result = FoodCategory::create($data);
            } else {
                $result = FoodCategory::where('is_deleted', 0)->where('id', $params['id'])->update($data);
            }
            if (!$result) {
                throw new \Exception('Thêm thất bại');
            }
            return $outputSuccess;
        } catch (Exception $e) {
            return ['status' => 1,'mess' => $e->getMessage()];
        }
    }
    public function detail(Request $r)
    {
        $params = $r->all(); //dang array

        // product detail
        $data['detail'] = FoodCategory::where('id', $params['id'])->where('is_deleted', 0)->first();
        $data['detail']->name = html_entity_decode($data['detail']->name);
        $data['detail']->description = html_entity_decode($data['detail']->description);

        return ['status' => 0, 'data' => $data] ;
    }

    public function delete(Request $r){
        $params = $r->all(); //dang array
        try {
            $id = $params['id'];
            DB::beginTransaction();
            FoodCategory::find($id)->update(['is_deleted' => 1]);
            Food::where('category_id', $id)->update(['category_id' => 0]);
            DB::commit();
            return ['status' => 0];
        } catch (\Exception $e ) {
            DB::rollBack();
            return ['status' => 1,'mess' => $e->getMessage()];
        }
    }

}
