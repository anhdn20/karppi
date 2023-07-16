@extends('admin.layout')
@section('content')
    <style>
        hr{
            margin-top: 0.4rem;
        }
        /* Custom CSS to center align the image */
        .fixed-size-image-block {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 200px;
            padding: 5px;
            border: 1px solid #ccc; /* Optional: Add a border to the block */
        }

        /* Style the image to fit the block without cropping */
        .fixed-size-image-block img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
    <x-headadmin title="Món ăn"></x-headadmin>

    @php
        $field = ['TT', 'Hình ảnh', 'Tên', 'Mô tả', 'Trạng thái', '#'];
    @endphp

    <x-table :field="$field"></x-table>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Thêm/chỉnh sửa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="dataForm">
                    @csrf
                    <div class="modal-body">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="row" id="form_tour">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên thực đơn</label>
                                                    <input name="name" class="form-control" id="name" placeholder="Nhập tên thực đơn" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-switch">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" checked>
                                                    <label class="form-check-label" for="is_active">Hiển thị trên trang Menu</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Hình ảnh</label>
                                                    <div class="fixed-size-image-block">
                                                        <img id='image' src="" alt="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Mô tả</label>
                                                    <textarea name="description" class="form-control" id="description" placeholder="Nhập mô tả"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="action" id="action" value="create">
                    </div>
                </form>
                <div class="card-body" id="formupimage">
                    <label for="">Hình ảnh</label>
                    <form action="{{url('/dropzone')}}" class="dropzone" id="image-upload" enctype="multipart/form-data">
                        @csrf
                        <div class="fallback">
                            <input name="food_image" type="file" id="food_image" multiple>
                        </div>
                        <div class="dz-message needsclick">
                            <div class="mb-3"> <i class="display-4 text-muted uil uil-cloud-upload"></i> </div>
                            <h4>Thả tệp vào đây hoặc nhấp để tải lên. (Chỉ khi cần thêm hoặc thay đổi)</h4>
                        </div>
                    </form>
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

        var FileArr = [];

        var myDropzone = new Dropzone("#image-upload", {
            maxFilesize: 3,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: true,
            success: function(file, response){
                FileArr.push(response);

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
                {data: 'image_url', name: 'Hình ảnh'},
                {data: 'name', name: 'Tên'},
                {data: 'description', name: 'Mô tả'},
                {data: 'is_active', name: 'Trạng thái'},
                {data: 'action', name: 'Hành Động'}
            ];
            load_data_ajax_datatables("{{ url('/karppi/admin/food-menu/list') }}",DataLoadFirst);

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

                let image   = FileArr;

                dataForm += '&image='  + image;
                var url = '{{url("/karppi/admin/food-menu/create")}}';
                insert(url,dataForm);
            })

            //xóa
            $(document).on('click','.del',function (e){
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{url("/karppi/admin/food-menu/delete")}}';
                del(url,id);
            })

            //xóa
            $(document).on('click','.icon_del',function (e){
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                var url = '{{url("/karppi/admin/quan-li-tour/xoa-anh")}}';
                delGallery(url,id, $(this));
            })

            // set action cho button
            $(document).on('click','#modalAddNew',async function (e){
                $('#action').attr('value', 'create');

            })

            //load data edit
            $(document).on('click','.update',async function (e){
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{url("/karppi/admin/food-menu/detail")}}';
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
                            let menuDetail = data.menu;

                            // set dữ liệu tour
                            $('#name').val(menuDetail.name);
                            $('#description').val(menuDetail.description);
                            $('#image').attr('src', menuDetail.image_url);
                            $('#id').attr('value', menuDetail.id);
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

