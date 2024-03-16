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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all leaves
        $leaves = Leaves::all();

        // Pass leaves data to the view
        return view('leaves.index', ['leaves' => $leaves]);
    }

    /**
     * Show the form for creating a new resource.
     */
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
            'leaves' => $leaves, // Pass $leaves to the view
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Leaves $leaves)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leaves $leaves)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leaves $leaves)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leaves $leaves)
    {
        //
    }
}
