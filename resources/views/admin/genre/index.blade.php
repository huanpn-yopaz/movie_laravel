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


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Thông tin lớp</h3>

                </div>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên genre</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genre as $key => $value)
                            <tr>
                                <td>
                                    @php
                                        $key++;
                                    @endphp
                                    {{ $key }}
                                </td>
                                <td>{{ $value->name_genre }}</td>
                                <td>{{ $value->created_at->diffForHumans()}}</td>
                                <td>{{ $value->updated_at->diffForHumans()}}</td>
                                <td style=" display:flex;gap:0 8px">
                                    <a href="{{ Route('genre.edit', [$value->id_genre]) }}"><span
                                            class="status completed">Sửa</span></a>
                                    <form action="{{ Route('genre.destroy', [$value->id_genre]) }}" method="post">
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
