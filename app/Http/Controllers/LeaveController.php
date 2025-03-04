<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with('user')->get();
        return view('leaves.index', compact('leaves'));
    }

    public function store(Request $request)
    {
        Leave::create($request->all());
        return redirect()->route('leaves.index');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->route('leaves.index');
    }
}
