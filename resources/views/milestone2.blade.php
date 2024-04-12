@include('components.header',['title' => 'Employees'])
    <div class="container">
        <h2>Employee Database</h2>

        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployeeModal">
            Add Employee
        </button>

        <div class="search-container">
            <form action="/search_results" method="GET">
                    @csrf
                <input type="text" class="search-box" placeholder="Search by employee name" name="search">
                <button type="submit" class="search-button">Search</button>
            </form>
        </div>
        <!-- Table to display data -->
        <table class="table mt-3">
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
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->employee_number}}</td>
                        <td>{{ $employee->firstname}}</td>
                        <td>{{ $employee->middlename}}</td>
                        <td>{{ $employee->lastname}}</td>
                        <td>{{ $employee->addressline}}</td>
                        <td>{{ $employee->barangay}}</td>
                        <td>{{ $employee->province}}</td>
                        <td>{{ $employee->country}}</td>
                        <td>{{ $employee->zipcode}}</td>
                        <td>
                            @if($employee->assignDesignation && $employee->assignDesignation->designation)
                                {{ optional($employee->assignDesignation->designation->department)->department_name }}
                            @endif
                        </td>
                        <td>
                            @if($employee->assignDesignation)
                                {{ optional($employee->assignDesignation->designation)->designation_name }}
                            @endif
                        </td>
                        <td>
                            @if($employee->assignDesignation)
                                {{ $employee->assignDesignation->employee_type }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for adding new employee -->
    <div class="modal" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Add New Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding new employee -->
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="employee_number">Employee Number</label>
                            <input type="text" class="form-control" id="employee_number" name="employee_number" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="middleName">Middle Name</label>
                            <input type="text" class="form-control" id="middleName" name="middlename">
                        </div>
                        <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastname" required>
                            </div>
                        <div class="form-group">
                            <label for="addressline">Address Line</label>
                            <input type="text" class="form-control" id="addressline" name="addressline" required>
                        </div>
                        <div class="form-group">
                            <label for="barangay">Barangay</label>
                            <input type="text" class="form-control" id="barangay" name="barangay" required>
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" name="province" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>
                        <div class="form-group">
                            <label for="zipcode">Zip Code</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                        </div>

                        <!-- Dropdown for Department -->
                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select class="form-control" id="department_id" name="department_id" required onchange="handleDropdownSelection(this.value)">
                                <option value="" disabled selected>Select Department or Add New</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                                <option value="new_department">Add New Department</option>
                            </select>
                        </div>

                        <!-- Dropdown for Designation -->
                        <div class="form-group">
                            <label for="designation_id">Designation</label>
                            <select class="form-control" id="designation_id" name="designation_id" required onchange="handleDropdownSelection(this.value)">
                                <option value="" disabled selected>Select Designation or Add New</option>
                                @foreach($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->designation_name }}</option>
                                @endforeach
                                
                                <option value="new_designation">Add New Designation</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="employee_type">Employee Type</label>
                            <select class="form-control" id="employee_type" name="employee_type" required>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <!-- Add other options as needed -->
                            </select>
                        </div>
                        
                        <!-- Add other form fields as needed -->
                        <button type="submit" class="btn btn-primary">Add Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@include('components.footer')
