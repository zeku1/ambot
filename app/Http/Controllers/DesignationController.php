<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Designation;
use App\Models\Department;

class DesignationController extends Controller
{
   public function index()
{
    $designations = Designation::all();
    $departments = Department::all();

    return view('designations.departments_designations', compact('designations', 'departments'));
}
public function create()
{
    $departments = Department::all();
    $designations = Designation::all();

    return view('designations.create_designation', compact('departments', 'designations'));
}

    public function store(Request $request)
{
    $request->validate([
        'designation_name' => 'required|unique:designations',
        'department_id' => 'required',
        'status' => 'required|in:active,inactive',
    ]);

    Designation::create($request->all());

    return redirect()->route('milestone2')->with('success', 'Designation created successfully');
}

public function destroy($id)
{
    $designation = Designation::findOrFail($id);
    $designation->delete();

    return redirect()->route('designations.index')->with('success', 'Designation deleted successfully');
}
    
}
