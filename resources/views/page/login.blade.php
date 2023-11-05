@section('title')
    Đăng nhập
@endsection
@extends('app')
@section('content')
<div class="animated-form">
    <form action="{{url('check_login')}}" method="post" class="form" autocomplete="off">
      @csrf
       <div class="title">Laravel</div>
       <div class="subtitle">Đăng nhập</div>
       @if (Session::has('fail'))
       <div class="error_input">{{Session::get('fail')}}</div> 
       {{Session::forget('fail')}}
       @endif
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
       <button type="submit" class="submit">Đăng nhập</button>
      
    </form>
 </div>
 
@endsection
