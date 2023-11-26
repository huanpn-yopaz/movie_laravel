@section('title')
    Đăng nhập
@endsection
@extends('app')
@section('content')
    <div class="animated-form">
        <form action="{{ url('forget-password') }}" method="post" class="form">
            @csrf
            <div class="title">Laravel</div>
            <div class="subtitle">Forget</div>
            <div class="input-container ic2">
                <input id="lastname" class="input" type="text" placeholder="" name="email"
                    value="{{ old('email') }}">
                <div class="cut"></div>
                <label for="lastname" class="placeholder">Email</label>
            </div>
            @error('email')
                <div class="error_input">{{ $message }}</div>
            @enderror
            <button type="submit" class="submit">Gui mail</button>

        </form>
    </div>
@endsection
