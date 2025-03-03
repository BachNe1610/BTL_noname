@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Phần bên trái: Hình ảnh hoặc nội dung khác -->
        <div class="col-md-6 d-flex align-items-center justify-content-center" style="background-color: white; height: 100vh; color: white; max-height: 550px;">
            <img src="{{ asset('img/anhquanlinhansu.jpg') }}" alt="Your image" class="img-fluid" style="max-height: 100%; object-fit: cover;" />
        </div>

        <!-- Phần bên phải: Form đăng nhập -->
        <div class="col-md-6 d-flex align-items-center justify-content-center" style="background-color: #fff; height: 100vh; max-height: 550px;">
            <div class="card " style="width: 90%; max-width: 350px;">
                <div class="card-header text-center text-white" style="background-color:rgb(4, 7, 85);">
                    <h4><strong>Đăng Nhập</strong></h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                            @error('email') 
                                <div class="invalid-feedback">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Mật khẩu:</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password') 
                                <div class="invalid-feedback">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary " style="background-color:rgb(4, 7, 85);">Đăng Nhập</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
