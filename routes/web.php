<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::resource('employees', EmployeeController::class);
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Đăng ký
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('employees.index');  // Nếu đã đăng nhập, chuyển tới trang danh sách nhân viên
    } else {
        return redirect()->route('login');  // Nếu chưa đăng nhập, chuyển tới trang đăng nhập
    }
});

Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class);
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');