@extends('layouts.app')
@section('content')
    <div class="text-center">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h2 class="text-primary"><i class="fas fa-list"></i> Danh Sách Nhân Viên</h2>
    </div>


    <form action="{{ route('employees.index') }}" method="GET" class="d-flex mb-3">
        <input type="text" name="search" class="form-control form-control-sm me-2" 
            style="width: 250px;" 
            placeholder="Nhập tên, vị trí hoặc phòng ban..." 
            value="{{ request()->search }}">
        <button type="submit" class="btn btn-sm btn-primary">🔍 Tìm Kiếm</button>
    </form>


        
    <div class="text-end mb-3">
        <button class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
            <i class="fas fa-user-plus"></i> Thêm Nhân Viên
        </button>
    </div>

    <table class="table table-hover table-bordered">
        <thead class="table-primary">
            <tr>
                <th><i class="fas fa-id-badge"></i> ID</th>
                <th><i class="fas fa-user"></i> Tên</th>
                <th><i class="fas fa-briefcase"></i> Chức Vụ</th>
                <th><i class="fas fa-building"></i> Phòng Ban</th>
                <th><i class="fas fa-calendar-alt"></i> Ngày Nhập</th>
                <th><i class="fas fa-money-bill-wave"></i> Lương</th>
                <th><i class="fas fa-cogs"></i> Hành Động</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td><i class="fas fa-id-badge"></i> {{ Str::limit($employee->id, 8, '') }}</td>
            <td><i class="fas fa-user-circle"></i> {{ $employee->name }}</td>
            <td><i class="fas fa-briefcase"></i> {{ $employee->position }}</td>
            <td><i class="fas fa-building"></i> {{ $employee->department }}</td>
            <td><i class="fas fa-calendar-alt"></i> {{ $employee->hire_date }}</td>
            <td><i class="fas fa-money-bill-wave"></i> {{ number_format($employee->salary, 2) }} VNĐ</td>
            <td>
                <button class="btn btn-warning btn-sm btn-custom edit-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#editEmployeeModal"
                        data-id="{{ $employee->id }}"
                        data-name="{{ $employee->name }}"
                        data-position="{{ $employee->position }}"
                        data-department="{{ $employee->department }}"
                        data-hire_date="{{ $employee->hire_date }}"
                        data-salary="{{ $employee->salary }}">
                    <i class="fas fa-edit"></i> Sửa
                </button>

                <button class="btn btn-danger btn-sm btn-custom delete-btn" 
                        data-id="{{ $employee->id }}"
                        data-name="{{ $employee->name }}"
                        data-position="{{ $employee->position }}">
                    <i class="fas fa-trash"></i> Xóa
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal Thêm Nhân Viên -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Nhân Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-user"></i> Tên</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-briefcase"></i> Chức Vụ</label>
                            <select name="position" class="form-control" required>
                                <option value="Nhân viên">Nhân viên</option>
                                <option value="Trưởng phòng">Trưởng phòng</option>
                                <option value="Giám đốc">Giám đốc</option>
                                <option value="Thực tập sinh">Thực tập sinh</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-building"></i> Phòng Ban</label>
                            <select name="department" class="form-control" required>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Kế toán">Kế toán</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Kỹ thuật">Kỹ thuật</option>
                                <option value="Bán hàng">Bán hàng</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-calendar-alt"></i> Ngày Nhập</label>
                            <input type="date" name="hire_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-money-bill-wave"></i> Lương</label>
                            <input type="number" step="0.01" name="salary" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sửa Nhân Viên -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa Nhân Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="editId">

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-user"></i> Tên</label>
                            <input type="text" name="name" id="editName" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-briefcase"></i> Chức Vụ</label>
                            <select name="position" id="editPosition" class="form-control">
                                <option value="Nhân viên">Nhân viên</option>
                                <option value="Trưởng phòng">Trưởng phòng</option>
                                <option value="Giám đốc">Giám đốc</option>
                                <option value="Thực tập sinh">Thực tập sinh</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-building"></i> Phòng Ban</label>
                            <select name="department" id="editDepartment" class="form-control">
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Kế toán">Kế toán</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Kỹ thuật">Kỹ thuật</option>
                                <option value="Bán hàng">Bán hàng</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-calendar-alt"></i> Ngày Nhập</label>
                            <input type="date" name="hire_date" id="editHireDate" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-money-bill-wave"></i> Lương</label>
                            <input type="number" step="0.01" name="salary" id="editSalary" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-warning">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Xác Nhận Xóa -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Xác Nhận Xóa Nhân Sự</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="deleteMessage">Bạn có chắc muốn xóa nhân sự này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Xử lý sửa nhân viên
                document.querySelectorAll('.edit-btn').forEach(button => {
                    button.addEventListener("click", function () {
                        let id = this.getAttribute("data-id");
                        let name = this.getAttribute("data-name");
                        let position = this.getAttribute("data-position");
                        let department = this.getAttribute("data-department");
                        let hire_date = this.getAttribute("data-hire_date");
                        let salary = this.getAttribute("data-salary");

                        console.log("Dữ liệu được cập nhật:", id, name, position, department, hire_date, salary); // Debug log

                        document.getElementById("editId").value = id;
                        document.getElementById("editName").value = name;
                        document.getElementById("editHireDate").value = hire_date;
                        document.getElementById("editSalary").value = salary;

                        // Cập nhật vị trí (position)
                        let positionSelect = document.getElementById("editPosition");
                        for (let option of positionSelect.options) {
                            if (option.value === position) {
                                option.selected = true;
                                break;
                            }
                        }

                        // Cập nhật phòng ban (department)
                        let departmentSelect = document.getElementById("editDepartment");
                        for (let option of departmentSelect.options) {
                            if (option.value === department) {
                                option.selected = true;
                                break;
                            }
                        }

                        document.getElementById("editForm").action = `/employees/${id}`;
                    });
                });

                // Xử lý xóa nhân viên
                document.querySelectorAll('.delete-btn').forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        let employeeId = this.dataset.id;
                        let employeeName = this.dataset.name;

                        document.getElementById('deleteMessage').innerText = `Bạn có chắc muốn xóa nhân sự "${employeeName}" không?`;
                        document.getElementById('deleteForm').action = "/employees/" + employeeId;

                        var deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                        deleteModal.show();
                    });
                });
            });
            document.addEventListener("DOMContentLoaded", function() {
                let searchInput = document.querySelector('input[name="search"]');

                searchInput.addEventListener("input", function() {
                    if (this.value === "") {
                        window.location.href = "{{ route('employees.index') }}";
                    }
                });
            });
        </script>
    @endsection
@endsection
