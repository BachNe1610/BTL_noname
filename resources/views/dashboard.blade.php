@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary"><i class="fas fa-chart-line"></i> Bảng Điều Khiển</h2>

    <!-- Số liệu tổng quan -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users"></i> Tổng số nhân viên</h5>
                    <p class="card-text fs-4">{{ $totalEmployees }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-building"></i> Số phòng ban</h5>
                    <p class="card-text fs-4">{{ $totalDepartments }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-calendar-alt"></i> Đơn nghỉ phép chờ duyệt</h5>
                    <p class="card-text fs-4">{{ $pendingLeaves }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-clock"></i> Tỷ lệ chấm công hôm nay</h5>
                    <p class="card-text fs-4">{{ $attendanceRate }}%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Danh sách nhân viên mới nhất -->
    <div class="mt-4">
        <h4><i class="fas fa-user-plus"></i> Nhân viên mới nhất</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Chức vụ</th>
                    <th>Phòng ban</th>
                    <th>Ngày vào</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($latestEmployees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->department }}</td>
                        <td>{{ $employee->hire_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
