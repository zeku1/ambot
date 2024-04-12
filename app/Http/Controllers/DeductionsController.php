<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Deductions;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DeductionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        $deductions = Deductions::all();
    
        return view('deductions', [
            'employees' => $employees,
            'deductions' => $deductions, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $deductions = Deductions::all();
    
        return view('deductions', [
            'employees' => $employees,
            'deductions' => $deductions, 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $validated=$request->validate([
                'employees_id' => 'required',
                'type_of_deductions' => 'required',
                'amount' => 'required',
                'date' => 'required',
            ]);
            Deductions::create($validated);
        
            return redirect()->back()->with('success', 'Deductions created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Deductions $deductions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deductions $deductions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deductions $deductions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deductions $deductions)
    {
        $deductions->delete();
        return redirect()->back()->with('success', 'Deduction deleted successfully');
    }
}
