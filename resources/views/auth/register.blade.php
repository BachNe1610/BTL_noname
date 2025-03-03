@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <!-- Phần hình ảnh bên trái -->
        <div class="col-md-6 d-flex align-items-center justify-content-center" style="background-color: white; height: 100vh; color: white; max-height: 550px;">
            <img src="{{ asset('img/anhquanlinhansu.jpg') }}" alt="Your image" class="img-fluid" style="max-height: 100%; object-fit: cover;" />
        </div>

        <!-- Phần đăng ký bên phải -->
        <div class="col-md-6 d-flex align-items-center justify-content-center" style="background-color: #fff; height: 100vh; max-height: 550px;">
            <div class="card" style="width: 90%; max-width: 350px;"> <!-- Giới hạn chiều rộng -->
                <div class="card-header text-center" style="background-color: #0A0A47; color: white;">
                    <h4>Đăng Ký</h4>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Họ Tên:</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                            @error('name') 
                                <div class="invalid-feedback">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
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

                        <div class="form-group mb-3">
                            <label for="password_confirmation">Xác nhận mật khẩu:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="background-color: rgb(4, 7, 85);">Đăng Ký</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p>Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập ngay</a></p>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
