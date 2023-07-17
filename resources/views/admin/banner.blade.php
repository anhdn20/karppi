@extends('admin.layout')
@section('content')
    <x-headadmin title="Quản lí hình ảnh"></x-headadmin>

    @php
        $field = ['TT','Tên','Loại','Hình ảnh','#'];
    @endphp

    <x-table :field="$field"></x-table>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm/chỉnh sửa hình ảnh</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="dataForm">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên hình ảnh</label>
                                        <input name="title" class="form-control" id="title" placeholder="Nhập tên">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loại hình ảnh</label>
                                        <select class="form-control select2" id="type" name="type" style="width: 100%;">
                                                <option value="LOGO">Logo</option>
                                                <option value="BANNER_HOME_HEAD">Banner dưới header</option>
                                                <option value="BANNER_HOME_SECTION_1">Banner nội dung home</option>
                                                <option value="BANNER_HOME_SECTION_2">Banner hình ảnh home 1</option>
                                                <option value="BANNER_HOME_SECTION_3">Banner hình ảnh home 2</option>
                                                <option value="BANNER_MENU_SECTION">Banner trang menu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Điều hướng (Nếu cần)</label>
                                        <input type="text" name="url_direction" class="form-control" id="url_direction" placeholder="Nhập url">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="action" id="action" value="create">
                    </div>
                </form>
                <div class="modal-body">
                    <div class="card-body">
                        <form action="{{url('/dropzone')}}" class="dropzone" id="image-upload" enctype="multipart/form-data">
                            @csrf
                            <div class="fallback">
                                <input name="file" type="file" id="image-upload1_1" multiple>
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3"> <i class="display-4 text-muted uil uil-cloud-upload"></i> </div>
                                <h4>Thả tệp vào đây hoặc nhấp để tải lên. (Chỉ khi cần thêm hoặc thay đổi)</h4>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" id="insertData">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setSuccessUpload(param){
            param.style.transition = '.5s';
            param.style.top = '125%';

            setTimeout(() => {
                param.style.opacity = '1';
                param.style.top = '50%';
                    setTimeout(() => {
                        param.style.opacity = '0';
                    }, 2000);
            }, 500);
        }
        var FileArr1 = [];
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(".dropzone", {
            maxFilesize: 3,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp",
            addRemoveLinks: true,
            success: function(file, response){
                console.log(response);
                FileArr1.push(response);

                setSuccessUpload(file.previewElement.children[4]);

            },
            removedfile: function(file) {

                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        });
        $(document).ready(function() {

            // tải dữ liệu lúc mới vào trang
            let DataLoadFirst = [
                {data: 'id', name: 'Thứ tự'},
                {data: 'title', name: 'Tên'},
                {data: 'type', name: 'Loại Image'},
                {data: 'image', name: 'Ảnh'},
                {data: 'action', name: 'Hành Động'},
            ];
            load_data_ajax_datatables("{{ url('/karppi/admin/data-banner') }}",DataLoadFirst);

            //insert
            $('#insertData').click(function (e) {
                e.preventDefault();
                let action = $('#action').val();
                let id = $('#id').val();

                // kiểm tra action
                if(action == 'create'){
                    id = 'undefined';
                }
                let image = FileArr1;
                var dataForm = $('#dataForm').serialize();
                dataForm += '&image=' + image;

                var url = '{{url("/karppi/admin/quan-li-hinh-anh/them")}}';
                insert(url,dataForm);
            })

            //xóa
            $(document).on('click','.del',function (e){
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                var url = '{{url("/karppi/admin/quan-li-hinh-anh/xoa")}}';
                del(url,id);
            })

            // set action cho button
            $(document).on('click','#modalAddNew',async function (e){
                $('#action').attr('value', 'create');
                // reset lại form cho tạo mới
                $("#dataForm")[0].reset()
            })

            //load data edit
            $(document).on('click','.update',async function (e){
                e.preventDefault();

                // myDropzone.removeAllFiles(true);

                var id = $(this).data('id');
                var url = '{{url("/karppi/admin/banner-detail")}}';
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
                            $('#sub_title_vi').val(data.sub_title_vi);
                            $('#sub_title_en').val(data.sub_title_en);
                            $('#text_btn_vi').val(data.text_btn_vi);
                            $('#text_btn_en').val(data.text_btn_en);
                            $('#type').val(data.type).change();
                            $('#url_direction').val(data.url_direction);
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

