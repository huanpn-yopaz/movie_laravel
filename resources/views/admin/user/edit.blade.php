@extends('admin')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit user</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Edit user</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Sửa user</h3>
                </div>
                <form action="{{ Route('user.update', [$user->id]) }}" method="post">
                    @method('put')
                    @csrf
                    <div>
                        <input type="text" class="input_form" value="{{ $user->name}}" name="name">
                        @error('name')
                        <p class="text-danger"><i class="bi bi-exclamation-triangle mx-1"></i>{{$message}}</p>
                    @enderror
                    </div>
                    <div>
                        <input type="text" class="input_form" value="{{ $user->email}}" name="email">
                        @error('email')
                        <p class="text-danger"><i class="bi bi-exclamation-triangle mx-1"></i>{{$message}}</p>
                    @enderror
                    </div>
                   <select name="role" id="" class="input_form">
                    @if ($user->role == 1)
                    <option value="0">User</option>
                    <option value="1" selected>Admin</option>
                    <option value="2">Vip</option>
                    @elseif($user->role == 2)
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                    <option value="2" selected>Vip</option>
                    @else
                    <option value="0" selected>User</option>
                    <option value="1">Admin</option>
                    <option value="2">Vip</option>
                    @endif
                   </select>
                    <div><button class="btn_form">Sửa</button></div>
                </form>
            </div>

        </div>
    </main>
@endsection
