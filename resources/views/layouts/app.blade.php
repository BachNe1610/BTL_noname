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
            background-color: #007bff;
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
            background: #007bff;
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .btn-custom {
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0A0A47;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('employees.index') }}">
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
