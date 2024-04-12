<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Designation;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('departments.departments_designations', compact('designations', 'departments'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('departments.create_department', compact('departments'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|unique:departments',
            'status' => 'required|in:active,inactive',
        ]);

        Department::create($request->all());

        return redirect()->route('milestone2')->with('success', 'Department created successfully');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name' => 'required|unique:departments,department_name,' . $department->id,
            'status' => 'required|in:active,inactive',
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully');
    }

    public function departmentsDesignations()
    {
        $departments = Department::all();
        $designations = Designation::all();

        return view('departments.departments_designations', compact('departments', 'designations'));
    }
}

