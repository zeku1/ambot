<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Earnings;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EarningsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        $earnings = Earnings::all();
    
        return view('earnings', [
            'employees' => $employees,
            'earnings' => $earnings, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $earnings = Earnings::all();
    
        return view('earnings', [
            'employees' => $employees,
            'earnings' => $earnings, 
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
                'type_of_earnings' => 'required',
                'amount' => 'required',
                'date' => 'required',
            ]);
            Earnings::create($validated);
        
            return redirect()->back()->with('success', 'Earnings created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Earnings $earnings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Earnings $earnings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Earnings $earnings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Earnings $earnings)
    {
        $earnings->delete();
        return redirect()->back()->with('success', 'Earning deleted successfully');
    }
}
