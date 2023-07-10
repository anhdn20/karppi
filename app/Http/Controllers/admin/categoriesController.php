<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class categoriesController extends Controller
{

    public function detail(Request $r){
        $params = $r->all(); //dang array
        $data = Category::find($params['id']);
        // $data->description_vi = html_entity_decode($data->description_vi);
        // $data->description_en = html_entity_decode($data->description_en);

        // $data['category'] = Category::where('parent', 0)->where('is_deleted', 0)->get()->toArray();

        return ['status' => 0, 'data' => $data] ;
    }

    public function listBlog(){
        $list = Category::where('is_deleted', 0)->where('type', 1)->orderBy('id','DESC')->get();

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

    public function listTour(){
        $list = Category::where('is_deleted', 0)->whereIn('type', [0,2])->orderBy('id','DESC')->get();
            return Datatables::of($list)
                ->editColumn('type', function ($row) {
                    if($row->type == 0){
                        $text = '<span class="badge badge-success">Danh mục</span>';
                    }else{
                        $text = '<span class="badge badge-secondary">Tabs</span>';
                    }
                    return html_entity_decode($text);
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
                ->rawColumns(['action','type'])

                ->make(true);
    }

    public function store(Request $r){
        $params = $r->all(); //dang array

        try {

            // validation
            $validator = Validator::make($params, [
                'title_vi' => 'required|max:100|unique:category,title_vi,'.$params['id'],
                'title_en' => 'required|max:100|unique:category,title_en,'.$params['id'],
                'cateparent1' => 'required',
                'typeCate' => 'required'
            ],[
                'title_vi.required' => 'Chưa nhập thông tin danh mục',
                'title_vi.unique' => 'Trùng thông tin danh mục',
                'title_vi.max' => 'không được nhập dài quá 100 kí tự',
                'title_en.required' => 'Chưa nhập thông tin danh mục',
                'title_en.unique' => 'Trùng thông tin danh mục',
                'title_en.max' => 'không được nhập dài quá 100 kí tự'
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first(),'type' => 'reload'];
            }


            // chuẩn bị data
            $data = [
                'title_vi' => $params['title_vi'],
                'title_en' => $params['title_en'],
                'slug' => Str::slug($params['title_vi']),
                'parent' => $params['cateparent1'],
                'type' => $params['typeCate'] // 0 là tour, 1 là blog
            ];

            if(isset($params['description_vi'])){
                $data['description_vi'] = htmlentities($params['description_vi']);
            }

            if(isset($params['description_en'])){
                $data['description_en'] = htmlentities($params['description_en']);
            }

            // kiểm tra nếu nó có ID thì sẽ update
            if(isset($params['id']) && $params['id'] != 'undefined' && $params['action'] == 'update'){
                // update vào database
                Category::where('id',$params['id'])->update($data);
                return ['status' => 0];
            }
            // add vào database
            Category::create($data);

            return ['status' => 0,'mess' => 'Thành công','type' => 'reload'];
        } catch (\Throwable $th) {
            return ['status' => 1,'mess' => $th];
        }
    }

    public function delete(Request $r){
        $params = $r->all(); //dang array
        try {
            // rev khỏi database
            $exec = Category::find($params['id'])->delete();
            return ['status' => 0];
        } catch (\Throwable $th) {
            return ['status' => 1,'mess' => $th];
        }
    }
}
