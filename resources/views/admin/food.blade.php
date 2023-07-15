@extends('admin.layout')
@section('content')
    <style>
        hr{
            margin-top: 0.4rem;
        }
    </style>
    <x-headadmin title="Quản lí tour"></x-headadmin>

    @php
        $field = ['TT','Tên','Mô tả','Giá' ,'Danh mục','#'];
    @endphp

    <x-table :field="$field"></x-table>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Thêm/chỉnh sửa tour</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST" id="dataForm">
                        @csrf
                        <div class="modal-body">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Tiếng việt</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                            <div class="row" id="form_tour">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tên Món ăn</label>
                                                        <input name="food_name" class="form-control" id="food_name" placeholder="Nhập tên món ăn" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Danh mục</label>
                                                        <select class="form-control select2" name="food_category_id" id="food_category_id" style="width: 100%;">
                                                            @foreach ($foodCategories as $value)
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Giá</label>
                                                        <input name="price" type="number" class="form-control" value="0" id="price" placeholder="Nhập giá" />
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Mô tả</label>
                                                        <textarea name="description" class="form-control" id="description" placeholder="Nhập mô tả"></textarea>
                                                    </div>
                                                </div>

                                                <div class="card-body" id="formupimage">
                                                    <label for="">Ảnh đại diện chính</label>
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

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" value="">
                            <input type="hidden" name="action" id="action" value="create">
                        </div>
                    </form>
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
        var FileArr1 = [];
        var FileArr2 = [];
        var FileArr3 = [];
        var FileArr4 = [];

        $(document).ready(function() {
            // tải dữ liệu lúc mới vào trang
            let DataLoadFirst = [
                {data: 'id', name: 'Thứ tự'},
                {data: 'name', name: 'Tên'},
                {data: 'description', name: 'Mô tả'},
                {data: 'price', name: 'Giá'},
                {data: 'category_name', name: 'Danh mục'},
                {data: 'action', name: 'Hành Động'}
            ];
            load_data_ajax_datatables("{{ url('/karppi/admin/data-food') }}",DataLoadFirst);

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
                let image1  = FileArr1;
                let image2  = FileArr2;
                let pdf     = FileArr3;
                let gallery = FileArr4;

                dataForm += '&image='  + image;
                dataForm += '&image1=' + image1;
                dataForm += '&image2=' + image2;
                dataForm += '&pdf=' + pdf;
                dataForm += '&gallery=' + gallery;
                var url = '{{url("/karppi/admin/food/create")}}';
                insert(url,dataForm);
            })

            //xóa
            $(document).on('click','.del',function (e){
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{url("/karppi/admin/quan-li-tour/xoa")}}';
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
                // reset lại form cho tạo mới
                $("#dataForm")[0].reset()
                // $('.select2').select2()
                $('#des_tab1_vi').summernote('code','');
                $('#des_tab2_vi').summernote('code','');
                $('#des_tab3_vi').summernote('code','');
                $('#des_tab4_vi').summernote('code','');
                $('#offer_vi').summernote('code','');
                $('#des_tab1_en').summernote('code','');
                $('#des_tab2_en').summernote('code','');
                $('#des_tab3_en').summernote('code','');
                $('#des_tab4_en').summernote('code','');
                $('#offer_en').summernote('code','');
                $('.box_gallery').hide();
                // $("#tag").val('').change();
                // $("#tab").val('').change();
            })

            //load data edit
            $(document).on('click','.update',async function (e){
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{url("/karppi/admin/tour-detail")}}';
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
                            let tour = data.detail;

                            // set dữ liệu tour
                            $('#title_vi').val(tour.title_vi);
                            $('#title_en').val(tour.title_en);
                            $('#sub_title_vi').val(tour.sub_title_vi);
                            $('#sub_title_en').val(tour.sub_title_en);
                            $('#title_tab1_vi').val(tour.title_tab1_vi);
                            $('#title_tab1_en').val(tour.title_tab1_en);

                            $('#des_tab1_vi').summernote('code',tour.des_tab1_vi);
                            $('#des_tab2_vi').summernote('code',tour.des_tab2_vi);
                            $('#des_tab3_vi').summernote('code',tour.des_tab3_vi);
                            $('#des_tab4_vi').summernote('code',tour.des_tab4_vi);
                            $('#offer_vi').summernote('code',tour.offer_vi);
                            $('#des_tab1_en').summernote('code',tour.des_tab1_en);
                            $('#des_tab2_en').summernote('code',tour.des_tab2_en);
                            $('#des_tab3_en').summernote('code',tour.des_tab3_en);
                            $('#des_tab4_en').summernote('code',tour.des_tab4_en);
                            $('#offer_en').summernote('code',tour.offer_en);

                            $('#video1').val(tour.video1);
                            $('#video2').val(tour.video2);
                            $('#video360').val(tour.video360);
                            $('#price').val(tour.price);
                            $('#price_discount').val(tour.price_discount);

                            $('#tab').val(tour.tab).change();
                            $('#tag').val(tour.tag).change();
                            $('#categoryId').val(tour.id_category).change();

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




                            $('#id').attr('value', tour.id);
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

