<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\review;
use App\Models\reviewGallery;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class reviewController extends Controller
{

    public function detail(Request $r){
        $params = $r->all(); //dang array
        $data = review::find($params['id']);
        $data->description_vi = html_entity_decode($data->description_vi);
        $data->description_en = html_entity_decode($data->description_en);

        // lấy gallery
        $data['galleries'] = reviewGallery::where('id_review',$params['id'])->get()->toArray();

        return ['status' => 0, 'data' => $data];
    }

    public function list(){
        $list = review::where('is_deleted', 0)->orderBy('id','DESC')->get();
            return Datatables::of($list)
                ->editColumn('description_vi', function ($row) {
                    return strip_tags(html_entity_decode($row->description_vi));
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

            $outputSuccess = ['status' => 0,'mess' => 'Thành công'];

            // validation
            $validator = Validator::make($params, [
                'title_vi' => 'required|max:200|unique:review,title_vi,'.$params['id'],
                'title_en' => 'required|max:200|unique:review,title_en,'.$params['id'],
            ],[
                'title_vi.required' => 'Chưa nhập thông tin review',
                'title_vi.unique' => 'Trùng thông tin review',
                'title_vi.max' => 'không được nhập dài quá 200 kí tự',
                'title_en.required' => 'Chưa nhập thông tin review',
                'title_en.unique' => 'Trùng thông tin review',
                'title_en.max' => 'không được nhập dài quá 200 kí tự'
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }
            // chuẩn bị data
            $data = [
                'title_vi' => $params['title_vi'],
                'title_en' => $params['title_en']
            ];

            if(isset($params['description_vi']) && $params['description_vi'] != ''){
                $data['description_vi'] = htmlentities($params['description_vi']);
            }

            if(isset($params['description_en']) && $params['description_en'] != ''){
                $data['description_en'] = htmlentities($params['description_en']);
            }


            DB::beginTransaction();

            // kiểm tra nếu nó có ID thì sẽ update
            if(isset($params['id']) && $params['id'] != 'undefined' && $params['action'] == 'update'){
                // update vào database
                review::where('id',$params['id'])->update($data);

                if(isset($params['image']) && $params['image'] != ''){
                    $arr = explode(',',$params['image']);
                    foreach ($arr as $value) {
                        reviewGallery::create(
                            [
                                'path' => $value,
                                'id_review' => $params['id']
                            ]
                        );
                    }
                    $outputSuccess['type'] = 'reload';
                }

                DB::commit();
                return $outputSuccess;
            }
            // add vào database
            $dataC = review::create($data);

            if(isset($params['image']) && $params['image'] != ''){
                $arr = explode(',',$params['image']);
                foreach ($arr as $value) {
                    reviewGallery::create(
                        [
                            'path' => $value,
                            'id_review' => $dataC->id
                        ]
                    );
                }
                $outputSuccess['type'] = 'reload';
            }

            DB::commit();
            return $outputSuccess;
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($params,$th);
            return ['status' => 1,'mess' => $th];
        }
    }

    public function delete(Request $r){
        $params = $r->all(); //dang array
        try {
            // rev khỏi database
            $exec = review::find($params['id'])->delete();
            return ['status' => 0];
        } catch (\Throwable $th) {
            dd($th);
            return ['status' => 1,'mess' => $th];
        }
    }

    public function deleteGallery(Request $r){
        $params = $r->all(); //dang array
        try {
            // rev khỏi database
            $exec = reviewGallery::find($params['id'])->delete();
            return ['status' => 0];
        } catch (\Throwable $th) {
            dd($th);
            return ['status' => 1,'mess' => $th];
        }
    }
}
