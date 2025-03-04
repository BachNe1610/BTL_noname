@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary"><i class="fas fa-calendar-alt"></i> Quản Lý Nghỉ Phép</h2>

    <!-- Nút thêm đơn nghỉ phép -->
    <div class="text-end mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLeaveModal">
            <i class="fas fa-plus"></i> Thêm Nghỉ Phép
        </button>
    </div>

    <!-- Bảng danh sách đơn nghỉ phép -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nhân viên</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Lý do</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaves as $leave)
            <tr>
                <td>{{ $leave->id }}</td>
                <td>{{ $leave->user->name }}</td>
                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ $leave->reason }}</td>
                <td>
                    @if($leave->status == 'pending')
                        <span class="badge bg-warning">Chờ duyệt</span>
                    @elseif($leave->status == 'approved')
                        <span class="badge bg-success">Đã duyệt</span>
                    @else
                        <span class="badge bg-danger">Từ chối</span>
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" 
                        data-bs-target="#editLeaveModal"
                        data-id="{{ $leave->id }}"
                        data-start_date="{{ $leave->start_date }}"
                        data-end_date="{{ $leave->end_date }}"
                        data-reason="{{ $leave->reason }}"
                        data-status="{{ $leave->status }}">
                        <i class="fas fa-edit"></i> Sửa
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $leave->id }}">
                        <i class="fas fa-trash"></i> Xóa
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Thêm Đơn Nghỉ Phép -->
<div class="modal fade" id="addLeaveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm Đơn Nghỉ Phép</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('leaves.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Ngày Bắt Đầu</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngày Kết Thúc</label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lý Do</label>
                        <textarea name="reason" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Xử lý JavaScript cho chỉnh sửa đơn nghỉ phép -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener("click", function () {
            let id = this.getAttribute("data-id");
            let start_date = this.getAttribute("data-start_date");
            let end_date = this.getAttribute("data-end_date");
            let reason = this.getAttribute("data-reason");
            let status = this.getAttribute("data-status");

            document.getElementById("editId").value = id;
            document.getElementById("editStartDate").value = start_date;
            document.getElementById("editEndDate").value = end_date;
            document.getElementById("editReason").value = reason;
            
            let statusSelect = document.getElementById("editStatus");
            for (let option of statusSelect.options) {
                if (option.value === status) {
                    option.selected = true;
                    break;
                }
            }
        });
    });

    // Xử lý xóa đơn nghỉ phép
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            let leaveId = this.dataset.id;

            if (confirm("Bạn có chắc muốn xóa đơn nghỉ phép này không?")) {
                fetch(`/leaves/${leaveId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }).then(() => {
                    location.reload();
                });
            }
        });
    });
});
</script>

@endsection
