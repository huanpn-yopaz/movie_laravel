@section('title')
    Đăng kí
@endsection
@extends('app')
@section('content')
<div class="animated-form">
    <form action="{{url('check_register')}}" method="post" class="form" autocomplete="off">
      @csrf
       <div class="title">Laravel</div>
       <div class="subtitle">Tạo tài khoản xem phim</div>
       <div class="input-container ic1">
          <input id="firstname" value="{{old('name')}}" class="input" type="text" placeholder="" name="name">

          <div class="cut"></div>
          <label for="firstname" class="placeholder">Tên đăng nhập</label>
       </div>
       @error('name')
       <div class="error_input">{{$message}}</div>
       @enderror
       <div class="input-container ic2">
          <input id="lastname" class="input" type="text" placeholder="" name="email" value="{{old('email')}}">
          <div class="cut"></div>
          <label for="lastname" class="placeholder">Email</label>
       </div>
        @error('email')
       <div class="error_input">{{$message}}</div>
       @enderror
       <div class="input-container ic2">
          <input id="lastname" class="input" type="password" placeholder="" name="password" value="{{old('password')}}">
          <div class="cut"></div>
          <label for="lastname" class="placeholder">Mật khẩu</label>
       </div>
        @error('password')
       <div class="error_input">{{$message}}</div>
       @enderror
       <button type="submit" class="submit">Đăng kí</button>
    </form>
 </div>
@endsection
