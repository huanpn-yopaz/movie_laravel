@extends('admin')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>genre</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">genre</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                </ul>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#model_add">
            add
        </button>
        <!-- Modal -->
        <div class="modal fade" id="model_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST" id="add_employee_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="text" name="name_pro" id="name_pro">
                            <span class="text-danger error-text name_pro"></span>
                            <input type="file" name="img_pro" id="img_pro">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="add_employee_btn" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        {{-- update --}}
        <div class="modal fade" id="model_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="edit_employee_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="text" name="id_pro" class="id_pro">
                            <input type="text" name="img_pro" class="img_pro">
                            <input type="text" name="name_pro" class="name_pro">
                            <input type="file" name="img_pro" class="img_pro">
                            <div class="img_render"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="update_employee_btn" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>STT</th>
                <th>STT</th>
                <th>Tên </th>
                <th>img</th>
                <th>Thao tác</th>
            </tr>
        </thead>
    </table>
    @push('script')
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#myTable').DataTable({
                processing: true,
                ajax: "{{ url('fetch_pro') }}",
                columns: [{
                        data: null
                    },
                    {
                        data: 'name_pro'
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            return `<img src="http://localhost/movie/storage/images/${row.img_pro}" alt="" width="30">`
                        }
                    },
                    {
                        "data": null,
                        searchable: false,
                        render: function(data, type, row) {
                            return ` <button id="delete_pro" data-id="${row.id_pro}" type="button">
                    <p class="text-error">Delete</p>
                </button>`
                        }
                    },
                    {
                        "data": null,
                        searchable: false,
                        render: function(data, type, row) {
                            return ` <button id="show" type="button" class="btn btn-primary"
                    data-id="${row.id_pro}" data-toggle="modal" data-target="#model_update">
                    update
                </button>`
                        }
                    },
                ]
            });
            table.on('order.dt search.dt', function() {
                table.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
            $("#add_employee_form").submit(function(e) {
                e.preventDefault();
                var fd = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('pro.store') }}',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: (response) => {
                        if (response.status == 200) {
                            table.ajax.reload();
                            $("#add_employee_form")[0].reset();
                            $("#model_add").modal('hide');
                        }
                    }
                })
            })
            function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
            console.log(key);
              $('.'+key+'_err').text(value);
            });
            printErrorMsg()
        }
            // delete
            $(document).on('click', '#delete_pro', function(e) {
                let id = $(this).data('id');
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: '{{ url('delete_pro') }}',
                    data: {
                        id: id
                    },
                    success: (response) => {
                        if (response.status == 200) {
                            table.ajax.reload();
                            swal("Good job!", "You clicked the button!", "success");
                        }
                    }
                })
            })
            // show
            $(document).on('click', '#show', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    url: '{{ url('show_pro') }}',
                    method: 'get',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        console.log(response)
                        const link_img = 'http://localhost/movie/storage/images/'
                        $(".img_render").html(
                            `<img src="${link_img}${response.img_pro}" alt="" width="31">`);
                        $(".id_pro").val(response.id_pro);
                        $(".name_pro").val(response.name_pro);
                        $(".img_pro").val(response.img_pro);
                        //    show
                    }
                });
            });
            // update
            $("#edit_employee_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $.ajax({
                    url: '{{ url('update_pro') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            table.ajax.reload();
                            $("#model_update").modal('hide');
                            swal("Good job!", "You clicked the button!", "success");
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
