<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Leaves;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LeavesController extends Controller
{
    public function index()
    {
        $leaves = Leaves::all();
        $employees = Employee::all();
        return view('leaves', [
            'leaves' => $leaves,
            'employees' => $employees,
        ]);
    }
    public function create()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $designations = Designation::all();
        $leaves = Leaves::all();
    
        return view('leaves', [
            'employees' => $employees,
            'departments' => $departments,
            'designations' => $designations,
            'leaves' => $leaves, 
        ]);
    }
    

    public function store(Request $request)
    {
        {
            $validated=$request->validate([
                'start_leave' => 'required',
                'end_leave' => 'required',
                'status' => 'required',
                'employees_id' => 'required',
                'leave_type' => 'required',
            ]);
            Leaves::create($validated);
        
            return redirect()->back()->with('success', 'Designation created successfully');
        }
    }

    public function destroy(Leaves $leave)
    {
        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave deleted successfully');
    }
}
