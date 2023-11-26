@section('title')
    Đăng nhập
@endsection
@extends('app')
@section('content')
    <div class="animated-form">
        <form action="{{ url('submitreset') }}" method="post" class="form" autocomplete="off">
            @csrf
            <input type="text" name="token" value="{{$token}}">
            <input type="text" name="email" value="{{$email}}">
            <div class="title">Laravel</div>
            <div class="subtitle">Reset</div>
            <div class="input-container ic2">
                <input id="lastname" class="input" type="text" placeholder="" name="password">
                <div class="cut"></div>
                <label for="lastname" class="placeholder">Password</label>
            </div>
            <button type="submit" class="submit">Reset</button>

        </form>
    </div>
@endsection
