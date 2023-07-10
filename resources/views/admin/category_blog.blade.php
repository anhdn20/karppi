@extends('admin.layout')
@section('content')
    <x-headadmin title="Quản lí danh mục"></x-headadmin>

    @php
        $field = ['TT','Tên','Mô tả','#'];
    @endphp

    <x-table :field="$field"></x-table>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" method="POST" id="dataForm">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm/chỉnh sửa danh mục</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên danh mục</label>
                                            <input name="title_vi" class="form-control" id="title_vi" placeholder="Nhập tên">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Danh mục cha</label>
                                            <div class="select2-purple">
                                                <select class="form-control select2" name="cateparent1" id="cateparent1" style="width: 100%;">
                                                        <option value="0">Không thuộc</option>
                                                        @foreach ($categories as $value)
                                                            <option value="{{$value['id']}}">{{$value['title_vi']}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="typeCate" id="typeCate" value="1">
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Loại danh mục</label>
                                            <div class="select2-purple">
                                                <select class="form-control select2" name="typeCate" id="typeCate" style="width: 100%;">
                                                    <option value="0" selected>Danh mục tour</option>
                                                    <option value="1">Danh mục bài viết</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mô tả</label>
                                            <textarea name="description_vi" class="form-control" id="description_vi" placeholder="Nhập mô tả"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên danh mục (en)</label>
                                            <input name="title_en" class="form-control" id="title_en" placeholder="Nhập tên">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mô tả (en)</label>
                                            <textarea name="description_en" class="form-control" id="description_en" placeholder="Nhập mô tả"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" value="">
                            <input type="hidden" name="action" id="action" value="create">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="insertData">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // tải dữ liệu lúc mới vào trang
            let DataLoadFirst = [
                {data: 'id', name: 'Thứ tự'},
                {data: 'title_vi', name: 'Tên'},
                {data: 'description_vi', name: 'Mô tả'},
                {data: 'action', name: 'Hành Động'},
            ];
            load_data_ajax_datatables("{{ url('/cludmed/admin/data-categories-blog') }}",DataLoadFirst);

            //insert
            $('#insertData').click(function (e) {
                e.preventDefault();
                let action = $('#action').val();
                let id = $('#id').val();

                // kiểm tra action
                if(action == 'create'){
                    id = 'undefined';
                }
                var dataForm = $('#dataForm').serialize();

                var url = '{{url("/cludmed/admin/quan-li-danh-muc-blog/them")}}';
                insert(url,dataForm);
                // location.reload();
            })

            //xóa
            $(document).on('click','.del',function (e){
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                var url = '{{url("/cludmed/admin/quan-li-danh-muc-blog/xoa")}}';
                del(url,id);
                // location.reload();
            })

            // set action cho button
            $(document).on('click','#modalAddNew',async function (e){
                $('#action').attr('value', 'create');
                $('#description_vi').summernote('code','');
                $('#description_en').summernote('code','');
                // reset lại form cho tạo mới
                $("#dataForm")[0].reset()
            })

            //load data edit
            $(document).on('click','.update',async function (e){
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{url("/cludmed/admin/categories-detail-blog")}}';
                // thông báo chờ
                Show_wait_announce();
                await $.ajax({
                    url:url,
                    type:"POST",
                    data: {
                        id : id,
                        _token : $('input[name="_token"]').val()
                    },
                    success:async function(response){
                        // đóng thông báo chờ
                        swal.close()
                        if(response.status == 0){
                            let data = response.data;
                            $('#title_vi').val(data.title_vi);
                            $('#title_en').val(data.title_en);
                            $('#description_vi').summernote('code',data.description_vi);
                            $('#description_en').summernote('code',data.description_en);
                            $('#typeCate').val(data.type).change();
                            $('#cateparent1').val(data.parent).change();

                            $('#id').attr('value', data.id);
                            $('#action').attr('value', 'update');
                            show_success_announce(300);
                        }else{
                            show_fail_announce(response.mess)
                        }
                    }
                });
            })
        });
    </script>
@endsection

