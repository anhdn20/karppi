<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class blogController extends Controller
{

    public function detail(Request $r){
        $params = $r->all(); //dang array
        $data = Blog::find($params['id']);
        $data->description_vi = html_entity_decode($data->description_vi);
        $data->description_en = html_entity_decode($data->description_en);

        return ['status' => 0, 'data' => $data];
    }

    public function list(){
        $list = Blog::where('is_deleted', 0)->orderBy('id','DESC')->get();
        return Datatables::of($list)
            ->editColumn('description_vi', function ($row) {
                return strip_tags(html_entity_decode($row->description_vi));
            })
            ->editColumn('image', function ($row) {
                $pathUpload = '';
                if($row->image != '' && $row->image != null){
                    $pathUpload = asset('uploads/').'/'.$row->image;
                }
                $html = '<img src="'.$pathUpload.'" alt="'.$row->title.'" style="max-width:110px;">';
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
                'title_vi' => 'required|max:200|unique:blog,title_vi,'.$params['id'],
                'title_en' => 'required|max:200|unique:blog,title_en,'.$params['id'],
                'cateparent1' => 'required',
                'sub_title_vi' => 'max:80',
                'sub_title_en' => 'max:80'
            ],[
                'title_vi.required' => 'Chưa nhập thông tin blog',
                'title_vi.unique' => 'Trùng thông tin blog',
                'title_vi.max' => 'Tiêu đề blog không được nhập dài quá 200 kí tự',
                'sub_title_vi.max' => 'Mô tả ngắn không được nhập dài quá 80 kí tự',
                'sub_title_en.max' => 'Mô tả ngắn không được nhập dài quá 80 kí tự',
                'title_en.required' => 'Chưa nhập thông tin blog',
                'title_en.unique' => 'Trùng thông tin blog',
                'title_en.max' => 'Tiêu đề blog không được nhập dài quá 200 kí tự'
            ]);

            if($validator->fails()){
                return ['status' => 1,'mess' => $validator->errors()->first()];
            }
            // chuẩn bị data
            $data = [
                'title_vi' => $params['title_vi'],
                'title_en' => $params['title_en'],
                'slug' => Str::slug($params['title_vi']),
                'id_category' => $params['cateparent1']
            ];

            if(isset($params['sub_title_vi'])){
                $data['sub_title_vi'] = $params['sub_title_vi'];
            }

            if(isset($params['sub_title_en'])){
                $data['sub_title_en'] = $params['sub_title_en'];
            }

            if(isset($params['description_vi'])){
                $data['description_vi'] = htmlentities($params['description_vi']);
            }

            if(isset($params['description_en'])){
                $data['description_en'] = htmlentities($params['description_en']);
            }

            if(isset($params['image']) && $params['image'] != ''){
                $data['image'] = $params['image'];
                $outputSuccess['type'] = 'reload';
            }

            if(isset($params['icon']) && $params['icon'] != ''){
                $data['icon'] = $params['icon'];
                $outputSuccess['type'] = 'reload';
            }

            // kiểm tra nếu nó có ID thì sẽ update
            if(isset($params['id']) && $params['id'] != 'undefined' && $params['action'] == 'update'){
                // update vào database
                Blog::where('id',$params['id'])->update($data);
                return $outputSuccess;
            }
            // add vào database
            Blog::create($data);

            return $outputSuccess;
        } catch (\Throwable $th) {
            dd($params,$th);
            return ['status' => 1,'mess' => $th];
        }
    }

    public function delete(Request $r){
        $params = $r->all(); //dang array
        try {
            // rev khỏi database
            $exec = Blog::find($params['id'])->delete();
            return ['status' => 0];
        } catch (\Throwable $th) {
            return ['status' => 1,'mess' => $th];
        }
    }
}
