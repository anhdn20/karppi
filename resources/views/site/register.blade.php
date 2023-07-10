@extends('site.layout')
@section('content')
<section class="section_3">
    <div class="container">
        <div class="row loginpagene">
            <div class="col-lg-4">
                <div class="register-page">
                    <form class="form" action="/home/register" method="post">
                        <h1>Đăng ký tài khoản</h1>
                        @csrf
                        <div>
                            <label for="name">Họ tên</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div>
                            <label for="email">Địa chỉ email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <div>{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div>
                            <label for="password">Ngày sinh</label>
                            <input id="date" type="date" name="date" required>
                        </div>
                        <div>
                            <label for="password">Mật khẩu</label>
                            <input id="password" type="password" name="password" required>
                        </div>

                        <div>
                            <label for="password_confirmation">Nhập lại mật khẩu</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="mt-2 btn-theme-in">Đăng ký</button>
                        </div>

                        <div class="message">
                            <p>Bạn đã có tài khoản? <a href="{{asset("/home/login")}}">Đăng nhập ở đây</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
