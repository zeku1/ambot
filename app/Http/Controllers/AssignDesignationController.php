<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\AssignDesignation;

class AssignDesignationController extends Controller
{
    public function index()
    {
        $assignDesignations = AssignDesignation::all();
        return view('assign-designations.index', compact('assignDesignations'));
    }

    public function create()
    {
        return view('assign-designations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_number' => 'required|exists:employees,employee_number',
            'designation_id' => 'required|exists:designations,id',
            'employee_type' => 'required', 
            'status' => 'required|in:active,resigned,not_showing_up',
        ]);

        AssignDesignation::create($request->all());

        return redirect()->route('assign-designations.index')->with('success', 'Assign Designation added successfully');
    }

    public function edit(AssignDesignation $assignDesignation)
    {
        return view('assign-designations.edit', compact('assignDesignation'));
    }

    public function update(Request $request, AssignDesignation $assignDesignation)
    {
        $request->validate([
            'employee_number' => 'required|exists:employees,employee_number',
            'designation_id' => 'required|exists:designations,id',
            'employee_type' => 'required', 
            'status' => 'required|in:active,resigned,not_showing_up',
        ]);

        $assignDesignation->update($request->all());

        return redirect()->route('assign-designations.index')->with('success', 'Assign Designation updated successfully');
    }

    public function destroy(AssignDesignation $assignDesignation)
    {
        $assignDesignation->delete();
        return redirect()->route('assign-designations.index')->with('success', 'Assign Designation deleted successfully');
    }
}
