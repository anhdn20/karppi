<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\FoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class FoodMenuController extends Controller
{
    public function list(){
        $menuModel = new FoodMenu();
        $data = $menuModel->getList();
        return Datatables::of($data)
            ->editColumn('is_active', function ($row) {
                $isCheck =  $row->is_active == 1 ? 'checked' : '';
                return '<div class="form-group">
                    <label class="toggle-switch">
                        <input type="checkbox" id="is_active" value="'.$row->id.'" name="is_active" '.$isCheck.' >
                        <span class="slider"></span>
                    </label>
                </div>';
//                return $row->is_active == 1 ?
//                    '<p style="color: limegreen">Đang dùng</p>' : '<p style="color: darkgrey">Không dùng</p>';
            })
            ->editColumn('image_url', function ($row) {
                $html = 'Không tìm thấy';
                if(!empty($row->image_url)) {
                    $pathUpload = asset('uploads/').'/'.$row->image_url;
                    $html = '<img src="'.$pathUpload.'" alt="'.$row->name.'" style="max-width:110px;">';
                }
                return $html;
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
            ->rawColumns(['action', 'intro', 'description', 'is_active', 'image_url'])
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
            ],[
                'name.required' => 'Chưa nhập tên món ăn',
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }
            // chuẩn bị data insert bảng product
            $data = [
                'name' => $params['name'],
                'description' => $params['description'],
                'intro' => $params['intro'],
            ];
            if (!empty($params['image'])) {
                $data['image_url'] = $params['image'];
            }
            DB::beginTransaction();
            if ($params['action'] == 'create') {
                $result = FoodMenu::create($data);
            } else {
                $result = FoodMenu::where('is_deleted', 0)->where('id', $params['id'])->update($data);
            }
            if (!$result) {
                throw new \Exception('Thất bại');
            }
            DB::commit();
            return $outputSuccess;
        } catch (\Exception $e) {
            DB::rollBack();
            return ['status' => 1,'mess' => $e->getMessage()];
        }
    }
    public function detail(Request $r)
    {
        $params = $r->all(); //dang array

        // menu detail
        $data['menu'] = FoodMenu::where('id', $params['id'])->where('is_deleted', 0)->first();
        $data['menu']->name = html_entity_decode($data['menu']->name);
        $data['menu']->description = html_entity_decode($data['menu']->description);
        $data['menu']->image_url = html_entity_decode(asset('uploads/').'/'.$data['menu']->image_url);

        return ['status' => 0, 'data' => $data] ;
    }

    public function active(Request $r)
    {
        $params = $r->all();
        $isActive = $params['is_active'] ?? 0;
        $id = $params['id'];
        try {
            DB::beginTransaction();
            if ($isActive == 1) {
                //chỉ được 1 row active
                FoodMenu::select()->update(['is_active' => 0]);
            }
            $data = [
                'is_active' => $isActive
            ];
            FoodMenu::where('id', $id)->update($data);
            DB::commit();
            return ['status' => 0];

        } catch (\Exception $e ) {
            DB::rollBack();
            return ['status' => 1,'mess' => $e->getMessage()];
        }
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
