<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản Lý Nhân Sự</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color:rgb(4, 3, 75);
            padding: 10px;
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .container-custom {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        .table th {
            background:rgb(11, 5, 94);
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .btn-custom {
            border-radius: 5px;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            border-right: 1px solid #ddd;
            background-color: #0A0A47;
            padding-top: 20px;
        }

        .sidebar h5 {
            padding-bottom: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar .nav-item {
            margin-bottom: 15px; /* Tạo khoảng cách giữa các mục */
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            font-size: 16px;
            padding: 12px 15px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar .nav-link i {
            margin-right: 10px; /* Khoảng cách giữa icon và chữ */
        }

        .sidebar .nav-link:hover {
            background-color: #ffffff;
            color: #0A0A47 !important;
            transform: translateX(5px); /* Hiệu ứng trượt nhẹ sang phải */
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0A0A47;">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="{{ route('employees.index') }}">
                <i class="fas fa-users"></i> Quản Lý Nhân Sự
            </a>

            <div class="ml-auto">
                @auth
                    <span class="navbar-text text-white">Xin chào, {{ Auth::user()->name }}!</span> 
                    <a class="btn btn-danger ml-3" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Đăng Xuất
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="d-flex">
        @auth
        <div class="sidebar p-3">
            <h5 class="text-white"><i class="fas fa-tachometer-alt"></i> Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i> Bảng điều khiển
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('employees.index') }}">
                        <i class="fas fa-users"></i> Quản lý nhân viên
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('leaves.index') }}">
                        <i class="fas fa-calendar-alt"></i> Quản lý nghỉ phép
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('attendance.index') }}">
                        <i class="fas fa-clock"></i> Quản lý chấm công
                    </a>
                </li>
            </ul>
        </div>
        @endauth

    <!-- Nội dung chính -->
    <div class="container container-custom">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function () {
            let alertMessages = document.querySelectorAll('.alert');
            alertMessages.forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 2000); 
    });
</script>
