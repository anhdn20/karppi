@extends('admin.layout')
@section('content')
    <x-headadmin title="Cấu hình chung"></x-headadmin>
    <style>
        .content-header #modalAddNew{
            display: none;
        }
        thead tr th:nth-child(3){
            max-width: 500px;
        }
    </style>

    @php
        $field = ['TT','Key','#'];
    @endphp

    <x-table :field="$field"></x-table>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" method="POST" id="dataForm">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Chỉnh sửa cấu hình</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá trị</label>
                                    <input type="text" name="value" class="form-control" id="value" placeholder="">
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
                {data: 'key_config', name: 'Email'},
                // {data: 'value', name: 'Họ và tên'},
                {data: 'action', name: 'Hành Động'},
            ];
            load_data_ajax_datatables("{{ url('/karppi/admin/data-config') }}",DataLoadFirst);

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

                var url = '{{url("/karppi/admin/quan-li-config/them")}}';
                insert(url,dataForm);
            })

            //load data edit
            $(document).on('click','.update',async function (e){
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{url("/karppi/admin/config-detail")}}';
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
                            $('#value').val(data.value);
                            $('#id').attr('value', data.id);
                            $('#action').attr('value', 'update');
                            // show_success_announce(300);
                        }else{
                            show_fail_announce(response.mess)
                        }
                    }
                });
            })
        });
    </script>
@endsection

