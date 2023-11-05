@extends('admin')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Add movie</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Add movie</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Tạo mới bài giảng</h3>
                </div>
                <form action="{{ Route('movie.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="text" class="input_form" placeholder="Tên video" name="name_movie">
                        <div><input onchange="loadFile_teacher(event)" type="file" name="img_movie"></div>
                        <img id="img_teacher" src="{{ url('img/no_img.jpg') }}" alt="" width="20%"><br>

                        <textarea name="video_movie" id="" cols="30" rows="10"></textarea>
                        <input type="text" class="input_form" placeholder="Diễn viên" name="people_movie">
                        <input type="text" class="input_form" placeholder="Điểm" name="point">
                        <input type="text" class="input_form" placeholder="Thời gian" name="time">
                        <select name="status_movie" id="" style="width:100%;padding:10px;margin:1rem 0">
                            
                            <option value="0">Free</option>
                            <option value="1">Vip</option>
                            
                        </select>
                        <select name="id_cate" id="" style="width:100%;padding:10px">
                            <option value="">Category</option>
                            @foreach ($cate as $value)
                            <option value="{{$value->id_cate}}">{{$value->name_cate}}</option>
                            @endforeach
                        </select> <br>
                        <div class="" style="margin: 1rem 0">
                            @foreach ($genre as $value)
                            <input value="{{$value->id_genre}}" type="checkbox" name="genre[]" id=""> {{$value->name_genre}}
                            @endforeach
                        </div>
                        <input name="tags_movie" id="tag-input1" type="text">
                        <textarea style="width: 100%" name="desc_movie" id="" cols="30" rows="10"></textarea>
                    </div>
                    
                    <div><button class="btn_form">Thêm</button></div>
                </form>
            </div>

        </div>
    </main>
@endsection
