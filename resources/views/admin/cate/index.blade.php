@extends('admin')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>cate</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">cate</a>
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
                            <th>Tên môn học</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cate as $key => $value)
                            <tr>
                                <td>
                                    @php
                                        $key++;
                                    @endphp
                                    {{ $key }}
                                </td>
                                <td>{{ $value->name_cate }}</td>
                                <td style=" display:flex;gap:0 8px">
                                    <a href="{{ Route('cate.edit', [$value->id_cate]) }}"><span
                                            class="status completed">Sửa</span></a>
                                    <form action="{{ Route('cate.destroy', [$value->id_cate]) }}" method="post">
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
