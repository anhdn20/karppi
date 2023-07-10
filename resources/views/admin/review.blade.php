@extends('admin.layout')
@section('content')
    <x-headadmin title="Quản lí review"></x-headadmin>

    @php
        $field = ['TT','Tên','mô tả','#'];
    @endphp

    <x-table :field="$field"></x-table>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm/chỉnh sửa review</h4>
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
                                        <label for="exampleInputEmail1">Tên review</label>
                                        <input name="title_vi" class="form-control" id="title_vi" placeholder="Nhập tên">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả</label>
                                        <textarea name="description_vi" class="form-control" id="description_vi" placeholder="Nhập mô tả"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên review (en)</label>
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
                            <div class="row mt-5">
                                <div class="box_gallery">
                                    <div class="item">
                                        <div class="icon_del">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <img src="" alt="">
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
            maxFiles: 50,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: true,
            success: function(file, response){
                FileArr1.push(response);

                setSuccessUpload(file.previewElement.children[4]);

            },
            removedfile: function(file) {
                // console.log(file);
                // var fileName = file.name;
                // var _token = $('input[name="_token"]').val();
                // $.ajax({
                // type: 'post',
                // url: "{{url('/dropzonedel')}}",
                // data: {name: fileName,_token:_token},
                //     success: function(data){
                //         let indexRe = FileArr1.indexOf(data);
                //             FileArr1.splice(indexRe,1);
                //     }
                // });

                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }

        });
        $(document).ready(function() {

            // tải dữ liệu lúc mới vào trang
            let DataLoadFirst = [
                {data: 'id', name: 'Thứ tự'},
                {data: 'title_vi', name: 'Tên'},
                {data: 'description_vi', name: 'Mô tả'},
                // {data: 'image', name: 'Ảnh'},
                {data: 'action', name: 'Hành Động'},
            ];
            load_data_ajax_datatables("{{ url('/cludmed/admin/data-review') }}",DataLoadFirst);

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
                console.log(dataForm);
                var url = '{{url("/cludmed/admin/quan-li-review/them")}}';
                insert(url,dataForm);
            })

            //xóa
            $(document).on('click','.del',function (e){
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                var url = '{{url("/cludmed/admin/quan-li-review/xoa")}}';
                del(url,id);
            })

            //xóa
            $(document).on('click','.icon_del',function (e){
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                var url = '{{url("/cludmed/admin/quan-li-review/xoa-anh")}}';
                delGallery(url,id, $(this));
            })

            // set action cho button
            $(document).on('click','#modalAddNew',async function (e){
                $('#action').attr('value', 'create');
                $('#description_vi').summernote('code','');
                $('#description_en').summernote('code','');
                $("#dataForm")[0].reset()
                $('.box_gallery').hide();
            })

            //load data edit
            $(document).on('click','.update',async function (e){
                e.preventDefault();

                // myDropzone.removeAllFiles(true);

                var id = $(this).data('id');
                var url = '{{url("/cludmed/admin/review-detail")}}';
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
                            // $('#description').val(data.description);
                            $('#description_vi').summernote('code',data.description_vi);
                            $('#description_en').summernote('code',data.description_en);
                            // console.log(data);
                            let gallery = '';
                            for (let i = 0; i < data.galleries.length; i++) {
                                let img = '{{asset("uploads/")}}' + "/" + data.galleries[i].path ;
                                gallery += `<div class="item">
                                                <div class="icon_del" data-id="${data.galleries[i].id}">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                                <img src="${img}" alt="">
                                            </div>`;

                            }

                            $('.box_gallery').show();
                            $('.box_gallery').html(gallery);

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

