function load_data_ajax_datatables(urlData, Data) {

    let table = $("#datatable").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        searching: true,
        ordering: true,
        info: true,
        processing: true,
        serverSide: false,
        cache: true,
        order: [[ 0, "desc" ]], //order cột đầu tiên
        columns: Data,
        ajax: {
            url: urlData,
            type: "post",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        },
        language: {
            sProcessing: "Đang xử lý...",
            sLengthMenu: "Xem _MENU_ mục",
            sZeroRecords: "Không tìm thấy dòng nào phù hợp",
            sInfo: "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
            sInfoEmpty: "Đang xem 0 đến 0 trong tổng số 0 mục",
            sInfoFiltered: "(được lọc từ _MAX_ mục)",
            sInfoPostFix: "",
            sSearch: "",
            sUrl: "",
            oPaginate: {
                sFirst: "Đầu",
                sPrevious: "Trước",
                sNext: "Tiếp",
                sLast: "Cuối"
            },
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            }
        },
        dom: "<'row'<'col-sm-12'l>>" +
                "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6 text-left'i><'col-sm-6'p>>",
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    });

    table.buttons().container().appendTo("#datatable_wrapper .col-md-6:eq(0)"),
    $(".dataTables_length select").addClass("form-select form-select-sm"),
    // $(".dataTables_filter label").append('<i class="fas fa-search fa-fw"></i>'),
    $(".dataTables_filter input").addClass('bg-light border-light rounded'),
    $(".dataTables_filter input").removeClass('form-control-sm'),
    $(".dataTables_filter input").attr('placeholder', 'Tìm kiếm ...'),
    $(".dataTables_filter label").addClass('position-relative');

}

async function insert(url,dataForm){
    // thông báo chờ
    Show_wait_announce();

    await $.ajax({
        url:url,
        type:"POST",
        data: dataForm,
        success:async function(response){
            // đóng thông báo chờ
            $('#insertData').removeAttr('data-id');
            swal.close()
            if(response.status == 0){
                if(response.type && response.type == 'reload'){
                    show_success_announce();
                    location.reload();
                }

                $('#datatable').DataTable().ajax.reload();
                $('#modal-lg').modal('hide');
                show_success_announce();
            }else{
                show_fail_announce(response.mess)
            }
        }
    });
}

async function insertForm(url,dataForm,token){
    // thông báo chờ
    Show_wait_announce();

    await $.ajax({
        url:url,
        type:"POST",
        data: dataForm,
        headers: {
            "X-CSRF-TOKEN": token
        },
        success:async function(response){
            // đóng thông báo chờ
            $('#insertData').removeAttr('data-id');
            swal.close()
            if(response.status == 0){
                $('#datatable').DataTable().ajax.reload();
                $('#modal-lg').modal('hide');
                show_success_announce();
            }else{
                show_fail_announce(response.mess)
            }
        }
    });
}

async function del(url,id){

    Swal.fire({
        title: 'Bạn có chắc muốn xóa?',
        text: "Dữ liệu sẽ không được hoàn lại",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, xóa đi!',
        cancelButtonText: 'Không nha',
      }).then(async (result) => {
        if (result.isConfirmed) {
        console.log($('input[name="_token"]').val());
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
                        $('#datatable').DataTable().ajax.reload();
                        show_success_announce();
                    }else{
                        show_fail_announce(response.mess)
                    }
                }
            });
        }
      })
}

async function delGallery(url,id, object){

    Swal.fire({
        title: 'Bạn có chắc muốn xóa?',
        text: "Dữ liệu sẽ không được hoàn lại",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, xóa đi!',
        cancelButtonText: 'Không nha',
      }).then(async (result) => {
        if (result.isConfirmed) {
        console.log($('input[name="_token"]').val());
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
                        object.closest('.item').remove();
                        show_success_announce();
                    }else{
                        show_fail_announce(response.mess)
                    }
                }
            });
        }
      })
}

function Show_wait_announce() {
    Swal.fire({
        imageUrl: "/assets/images/loading.gif",
        text : 'Vui lòng chờ trong giây lát...',
        showConfirmButton: false,
    })
}

function show_fail_announce(text = '') {
    Swal.fire({
        icon: 'error',
        title: 'Thất bại',
        text : text,
        showConfirmButton: false,
        // timer: 1000,
        // timerProgressBar: true
    })
}

function show_success_announce(time = 1000) {
    Swal.fire({
        icon: 'success',
        title: 'Thành công',
        showConfirmButton: false,
        timer: time,
        timerProgressBar: true
    })
}

// khởi chạy select 2
$('.select2').select2()


//Date picker
$('.dateE').datetimepicker({
    format: 'L'
});

$('#description_menu').summernote({
    fontNames: ['brother', 'brotherL', 'azote', 'ainslie', 'OskarBold'],
    fontNamesIgnoreCheck: ['brother', 'brotherL', 'azote', 'ainslie', 'OskarBold'],
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
});

$('#intro_menu').summernote({
    fontNames: ['brother', 'brotherL', 'azote', 'ainslie', 'OskarBold'],
    fontNamesIgnoreCheck: ['brother', 'brotherL', 'azote', 'ainslie', 'OskarBold'],
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
});

$('#description_group').summernote({
    fontNames: ['brother', 'brotherL', 'azote', 'ainslie', 'OskarBold'],
    fontNamesIgnoreCheck: ['brother', 'brotherL', 'azote', 'ainslie', 'OskarBold'],
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
});

$('#description_food').summernote({
    fontNames: ['brother', 'brotherL', 'azote', 'ainslie', 'OskarBold'],
    fontNamesIgnoreCheck: ['brother', 'brotherL', 'azote', 'ainslie', 'OskarBold'],
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
});



// form repeater
function repeaterFormat(classN){
    $('.'+classN+'').repeater({
        show: function () {
            $(this).slideDown();
            $(this).find('select').next('.select2-container').remove();
            $('.select2').select2();
        },
        hide: function (deleteElement) {
            console.log(deleteElement,classN);
            if (confirm('Are you sure you want to delete this element?')) {
            $(this).slideUp(deleteElement);
            }
        }
    });
}
// repeaterFormat('repeater-default1');
// repeaterFormat('repeater-default2');
// repeaterFormat('repeater-default3');

