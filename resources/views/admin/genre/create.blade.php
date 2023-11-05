@extends('admin')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Add genre</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Add genre</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Tạo mới Genre</h3>
                </div>
                <form action="{{ Route('genre.store') }}" method="post">
                    @csrf
                    <div>
                        <input type="text" class="input_form" placeholder="Tên genre" name="name_genre">
                    </div>
                    <div><button class="btn_form">Thêm</button></div>
                </form>
            </div>

        </div>
    </main>
@endsection
