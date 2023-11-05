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
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Thông tin lớp</h3>

                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên </th>
                            <th>img</th>

                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pro as $value)
                            <tr>
                                <td>{{ $value->name_pro }}</td>
                                <td><img src="{{ asset('storage/images/' . $value->img_pro) }}" alt=""></td>
                                <td><button id="show" type="button" class="btn btn-primary"
                                        data-id="{{ $value->id_pro }}" data-toggle="modal" data-target="#model_update">
                                        update
                                    </button></td>

                                <td>

                                    <button id="delete_pro" data-id="{{ $value->id_pro }}" type="button">
                                        <p class="text-error">Delete</p>
                                    </button>

                                </td>


                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>

        </div>
    </main>
@endsection
