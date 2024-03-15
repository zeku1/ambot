<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Routing\Controller;
use App\Models\Department;
use App\Models\Designation;

class DatabaseController extends Controller
{
    public function index(){
        $employees = Employee::with('assignDesignation', 'department', 'designation')->get();
        $departments = Department::all(); 
        $designations = Designation::all();
    
        return view('milestone2', compact('employees', 'departments', 'designations'));
    }

    public function store(Request $request)
{
    $request->validate([
        'employee_number' => 'required|unique:employees',
        'firstname' => 'required',
        'employee_type' => 'required',
    ]);

    // Create the employee
    $employee = Employee::create([
        'employee_number' => $request->input('employee_number'),
        'firstname' => $request->input('firstname'),
        'middlename' => $request->input('middlename'),
        'lastname' => $request->input('lastname'),
        'addressline' => $request->input('addressline'),
        'barangay' => $request->input('barangay'),
        'province' => $request->input('province'),
        'country' => $request->input('country'),
        'zipcode' => $request->input('zipcode'),
    ]);

   
    $employee->assignDesignation()->updateOrCreate(
        ['employee_number' => $request->input('employee_number')],
        [
            'designation_id' => $request->input('designation_id'),
            'employee_type' => $request->input('employee_type'),
            'status' => 'active',
        ]
    );

    return redirect()->route('employees.index')->with('success', 'Employee added successfully');
}
public function edit(Employee $employee)
{
    $departments = Department::all();
    $designations = Designation::all();

    return view('create_edit', compact('employee', 'departments', 'designations'));
}
public function update(Request $request, Employee $employee)
{
    $request->validate([
        'employee_number' => 'required|unique:employees,employee_number,' . $employee->id,
        'firstname' => 'required',
        'department_id' => 'required',
        'designation_id' => 'required',
        'employee_type' => 'required',
        'designation_name' => 'nullable', 
        'department_name' => 'nullable',
    ]);

    $employee->update([
        'employee_number' => $request->input('employee_number'),
        'firstname' => $request->input('firstname'),
        'middlename' => $request->input('middlename'),
        'lastname' => $request->input('lastname'),
        'addressline' => $request->input('addressline'),
        'barangay' => $request->input('barangay'),
        'province' => $request->input('province'),
        'country' => $request->input('country'),
        'zipcode' => $request->input('zipcode'),
        'department_id' => $request->input('department_id'),
        'designation_id' => $request->input('designation_id'),
        'employee_type' => $request->input('employee_type'),
    ]);

    $employee->update($request->all());



$designationId = $request->input('designation_id');
$departmentId = $request->input('department_id');


$employee->assignDesignation()->updateOrCreate(
    ['employee_number' => $request->input('employee_number')],
    [
        'designation_id' => $designationId,
        'employee_type' => $request->input('employee_type'),
        'status' => 'active',
    ]
);

if (!empty($designationId) && $designation = Designation::find($designationId)) {
    $designationName = $request->input('designation_name');
    if (!is_null($designationName)) {
        $designation->update(['designation_name' => $designationName]);
    }
}

if (!empty($departmentId) && $department = Department::find($departmentId)) {
    $departmentName = $request->input('department_name');
    if (!is_null($departmentName)) {
        $department->update(['department_name' => $departmentName]);
    }
}

return redirect()->route('employees.index')->with('success', 'Employee updated successfully');

}


public function departmentsDesignations()
{
    $departments = Department::all();
    $designations = Designation::all();

    return view('departments_designations', compact('departments', 'designations'));
}


public function createDepartment()
    {
        return view('departments.create_department');
    }

    public function createDesignation()
{
    $departments = Department::all();

    return view('designations.create_designation', compact('departments'));
}
public function search(Request $request)
{
    $searchTerm = $request->input('search');
    Log::info('Search Term: ' . $searchTerm); 

    $employees = Employee::where('firstname', 'like', "%$searchTerm%")
    ->orWhere('lastname', 'like', "%$searchTerm%")
    ->orWhere('middlename', 'like', "%$searchTerm%")
    ->orWhere('zipcode', 'like', "%$searchTerm%")
    ->orWhere('country', 'like', "%$searchTerm%")
    ->orWhere('province', 'like', "%$searchTerm%")
    ->orWhere('barangay', 'like', "%$searchTerm%")
    ->orWhere('addressline', 'like', "%$searchTerm%")
    ->orWhere('employee_number', 'like', "%$searchTerm%")
    ->get();
    $departments = Department::where('department_name', 'like', "%$searchTerm%")
    
    ->get();
    $designations = Designation::where('designation_name', 'like', "%$searchTerm%")->get();

    return view('search_results', compact('employees', 'departments', 'designations'));
}
    public function milestone2()
    {
        $employees = Employee::all(); 
        $departments = Department::all();
        $designations = Designation::all();
        return view('milestone2', compact('employees', 'departments', 'designations'));
    }

    }

