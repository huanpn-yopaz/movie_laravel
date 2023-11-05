@extends('admin')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Add movie</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Update movie</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Update mới bài giảng</h3>
                </div>
                <form action="{{ Route('movie.update',[$movie->id_movie]) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div>
                        <input type="text" class="input_form" placeholder="Tên video" name="name_movie" value="{{$movie->name_movie}}">
                        <div><input onchange="loadFile_teacher(event)" type="file" name="img_movie"></div>
                        <img id="img_teacher" src="{{ asset('img/'.$movie->img_movie) }}" alt="" width="20%"><br>
                        
                        <input type="text" class="input_form" placeholder="Diễn viên" name="people_movie" value="{{$movie->people_movie}}">
                        <input type="text" class="input_form" placeholder="Điểm" name="point" value="{{$movie->point}}">
                        <input type="text" class="input_form" placeholder="Thời gian" name="time" value="{{$movie->time}}">
                        <select name="status_movie" id="" style="width:100%;padding:10px;margin:1rem 0">
                            
                            @if ($movie->status_movie == 0)
                            <option value="0" selected>Free</option>
                            <option value="1">Vip</option>
                            @else
                            <option value="0">Free</option>
                            <option value="1" selected>Vip</option>
                            @endif
                            
                        </select>
                        <select name="id_cate" id="" style="width:100%;padding:10px">
                            <option value="">Category</option>
                            @foreach ($cate as $value)
                            <option {{($value->id_cate==$movie->id_cate) ? 'selected' : ''}} value="{{$value->id_cate}}">{{$value->name_cate}}</option>
                            @endforeach
                        </select> <br>
                        <div class="" style="margin: 1rem 0">
                            @foreach ($genre as $value)
                            <input {{($movie_genre->contains($value->id_genre)) ? 'checked' : ''}} value="{{$value->id_genre}}" type="checkbox" name="genre[]" id=""> {{$value->name_genre}}
                            
                            @endforeach
                        </div>
                        <input class="input_form" style="width:100%" name="tags_movie"  type="text" value="{{$movie->tags_movie}}">
                        <textarea style="width: 100%" name="desc_movie" id="" cols="30" rows="10">{{$movie->desc_movie}}</textarea>
                    </div>
                    <div><button class="btn_form">Update</button></div>
                </form>
            </div>

        </div>
    </main>
@endsection
