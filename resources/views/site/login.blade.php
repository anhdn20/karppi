@extends('site.layout')
@section('content')
<section class="section_3">
    <div class="container">
        <div class="row loginpagene">
            <div class="col-lg-4">
                <div class="login-page">
                    <div class="form">
                        <h1 class="mb-5">Đăng nhập</h1>
                        @if($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                        <form class="login-form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                            </div>

                            <div>
                                <input id="password" type="password" name="password" placeholder="Mật khẩu" required>
                            </div>

                            <div>
                                <button type="submit" class="mt-2 btn-theme-in">
                                    Đăng nhập
                                </button>
                            </div>

                            <p class="message">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
