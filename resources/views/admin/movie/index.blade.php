@extends('admin')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Danh sách video</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Danh sách video</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>

                </ul>
            </div>
        </div>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Thông tin lớp</h3>

                </div>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên video</th>
                            <th>Status</th>
                            <th>Ảnh poster</th>
                            <th>Genre</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movie as $key => $value)
                            <tr>
                                <td>
                                    @php
                                        $key++;
                                    @endphp
                                    {{ $key }}
                                </td>
                                <td>{{ $value->name_movie }}</td>
                                @if ($value->status_movie==1)
                           <td><span class="status completed">vip</span></td>
                           @else
                           <td><span class="status pending">free</span></td>
                           @endif
                                <td><img src="{{ asset('img/' . $value->img_movie) }}" alt=""></td>
                                <td>@foreach ($value->movie_genre as $genre)
                                    {{$genre->name_genre}}
                                @endforeach</td>
                                <td style=" display:flex;gap:0 8px">
                                    <a href="{{ Route('movie.edit', [$value->id_movie]) }}"><span
                                            class="status completed">Sửa</span></a>
                                    <form action="{{ Route('movie.destroy', [$value->id_movie]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="status completed" style="border:none">Xóa</button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </main>
@endsection
