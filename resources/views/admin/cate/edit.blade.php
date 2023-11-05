@extends('admin')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit cate</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Edit cate</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Sửa danh muc</h3>
                </div>
                <form action="{{ Route('cate.update', [$cate->id_cate]) }}" method="post">
                    @method('put')
                    @csrf
                    <div>
                        <input type="text" class="input_form" value="{{ $cate->name_cate }}" name="name_cate">
                    </div>
                    <div><button class="btn_form">Sửa</button></div>
                </form>
            </div>

        </div>
    </main>
@endsection
