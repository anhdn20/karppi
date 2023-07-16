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
                {data: 'name', name: 'Tên'},
                {data: 'description', name: 'Mô tả'},
                {data: 'price', name: 'Giá'},
                {data: 'category_name', name: 'Danh mục'},
                {data: 'action', name: 'Hành Động'}
            ];
            load_data_ajax_datatables("{{ url('/karppi/admin/food/list') }}",DataLoadFirst);

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
                var url = '{{url("/karppi/admin/food/delete")}}';
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
                var url = '{{url("/karppi/admin/food/detail")}}';
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
                            let food = data.detail;

                            // set dữ liệu tour
                            $('#food_name').val(food.name);
                            $('#price').val(food.price);
                            $('#description').val(food.description);
                            $('#food_category_id').val(food.category_id).change();





                            $('#id').attr('value', food.id);
                            $('#action').attr('value', 'update');
                            show_success_announce(300);
                        }else{
                            show_fail_announce(response.mess)
                        }
                    }
                });
            })
        });
