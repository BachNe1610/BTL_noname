<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Leave;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();
        $pendingLeaves = Leave::where('status', 'pending')->count();
        $attendanceRate = Attendance::whereDate('created_at', now()->toDateString())->count();

        $latestEmployees = Employee::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalEmployees',
            'totalDepartments',
            'pendingLeaves',
            'attendanceRate',
            'latestEmployees'
        ));
    }

}
