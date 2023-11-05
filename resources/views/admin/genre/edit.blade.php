@extends('admin')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit Zoom</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Edit Zoom</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Sửa lớp</h3>
                </div>
                <form action="{{ Route('zoom.update', [$zoom->id_zoom]) }}" method="post">
                    @method('put')
                    @csrf
                    <div>
                        <input type="text" class="input_form" value="{{ $zoom->name_zoom }}" name="name_zoom">
                    </div>
                    <div><button class="btn_form">Sửa</button></div>
                </form>
            </div>

        </div>
    </main>
@endsection
