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

                            //set dữ liệu
                            $('#name').val(menuDetail.name);
                            $('#description').val(menuDetail.description);
                            $('#image').attr('src', menuDetail.image_url);
                            $('#id').attr('value', menuDetail.id);
                            $('#action').attr('value', 'update');
                            $("#is_active").val(menuDetail.is_active);

                            if (menuDetail.is_active == 1) {
                                $("#is_active").prop("checked", true);
                            } else {
                                $("#is_active").prop("checked", false);
                            }
                            show_success_announce(300);
                        }else{
                            show_fail_announce(response.mess)
                        }
                    }
                });
            })

            document.getElementById("is_active").addEventListener("change", function() {
                // Get the checkbox state (checked or not checked)
                var isChecked = this.checked;

                // Do something based on the checkbox state (e.g., update settings, show/hide content, etc.)
                if (isChecked) {
                    $("#is_active").val(1);
                // Perform actions for when the toggle is ON
                } else {
                    $("#is_active").val(0);
                // Perform actions for when the toggle is OFF
                }
            });
        });
