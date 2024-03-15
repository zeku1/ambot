@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Search Results</h2>

        <!-- Display Employee Results -->
        @if($employees->count() > 0)
            <h3>Employees</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Number</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Address Line</th>
                        <th>Barangay</th>
                        <th>Province</th>
                        <th>Country</th>
                        <th>Zip Code</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Employee Type</th>
                        <!-- Add more columns if needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->employee_number }}</td>
                            <td>{{ $employee->firstname }}</td>
                            <td>{{ $employee->middlename }}</td>
                            <td>{{ $employee->lastname }}</td>
                            <td>{{ $employee->addressline }}</td>
                            <td>{{ $employee->barangay }}</td>
                            <td>{{ $employee->province }}</td>
                            <td>{{ $employee->country }}</td>
                            <td>{{ $employee->zipcode }}</td>
                            <td>
                                @if ($employee->department)
                                    {{ $employee->department->department_name }}
                                @endif
                            </td>
                            <td>
                                @if ($employee->designation)
                                    {{ $employee->designation->designation_name }}
                                @endif
                            </td>
                            <td>{{ $employee->assignDesignation->employee_type }}</td>
                            <!-- Add more columns if needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Display Department Results -->
        @if($departments->count() > 0)
            <h3>Departments</h3>
            <ul>
                @foreach($departments as $department)
                    <li>{{ $department->department_name }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Display Designation Results -->
        @if($designations->count() > 0)
            <h3>Designations</h3>
            <ul>
                @foreach($designations as $designation)
                    <li>{{ $designation->designation_name }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Display a message if no results found -->
        @if($employees->isEmpty() && $departments->isEmpty() && $designations->isEmpty())
            <p>No results found.</p>
        @endif
    </div>
@endsection
