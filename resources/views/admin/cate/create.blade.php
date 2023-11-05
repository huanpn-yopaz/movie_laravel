@extends('admin')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Add object</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Add object</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Tạo danh muc</h3>
                </div>
                <form action="{{ Route('cate.store') }}" method="post">
                    @csrf
                    <div>
                        <input type="text" class="input_form" placeholder="Tên danh muc" name="name_cate">
                    </div>
                    <div><button class="btn_form">Thêm danh muc</button></div>
                </form>
            </div>

        </div>
    </main>
@endsection
