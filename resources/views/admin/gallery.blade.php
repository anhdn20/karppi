@extends('admin.layout')
@section('content')
    <x-headadmin title="Quản lí Gallery"></x-headadmin>

    @php
        $field = ['TT','Tiêu đề','Ảnh','Sắp xếp','#'];
    @endphp

    <x-table :field="$field"></x-table>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm/chỉnh sửa gallery</h4>
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
                                        <label for="exampleInputEmail1">TIêu đề gallery</label>
                                        <input name="title" class="form-control" id="title" placeholder="Nhập tiêu đề">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loại</label>
                                        <div class="select2-purple">
                                            <select class="form-control select2" name="type" id="type" style="width: 100%;">
                                                <option value="IMAGE">Hình ảnh</option>
                                                <option value="VIDEO">Video</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Đường dẫn Youtube (Nếu có)</label>
                                        <input name="url" class="form-control" id="url" placeholder="Nhập đường dẫn">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Thứ tự ưu tiên</label>
                                        <input name="priority" class="form-control" id="priority" placeholder="Mặc định là 0">
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

    <script type="text/javascript">
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
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: true,
            success: function(file, response){
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
                {data: 'image', name: 'Mô tả'},
                {data: 'priority', name: 'Sắp xếp'},
                {data: 'action', name: 'Hành Động'},
            ];
            load_data_ajax_datatables("{{ url('/karppi/admin/data-gallery') }}",DataLoadFirst);

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

                var url = '{{url("/karppi/admin/gallery/them")}}';
                insert(url,dataForm);
            })

            //xóa
            $(document).on('click','.del',function (e){
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                var url = '{{url("/karppi/admin/gallery/xoa")}}';
                del(url,id);
            })

            //xóa
            $(document).on('click','.icon_del',function (e){
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                var url = '{{url("/karppi/admin/gallery/xoa-anh")}}';
                delGallery(url,id, $(this));
            })

            // set action cho button
            $(document).on('click','#modalAddNew',async function (e){
                $('#action').attr('value', 'create');
                $("#dataForm")[0].reset()
                $('.box_gallery').hide();
            })

            //load data edit
            $(document).on('click','.update',async function (e){
                e.preventDefault();

                // myDropzone.removeAllFiles(true);

                var id = $(this).data('id');
                var url = '{{url("/karppi/admin/gallery-detail")}}';
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
                            $('#title').val(data.title);
                            $('#type').val(data.type).change();
                            $('#url').val(data.url);
                            $('#priority').val(data.priority);

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

