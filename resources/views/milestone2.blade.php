<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Database</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        body {
            padding: 70px;
        }
        h2{
            margin-top: 50px;
            text-align: center;
        }
        table, th, td {
            justify-content: center;
            align-items: center;
        }
        .container{
            max-width: 2400px;
            margin: 0 auto;
            justify-content: center;
            align-items: center;
        }
        nav {
            background-color: #007bff; /* Bootstrap primary color */
        }
        nav a {
            color: white;
            margin-right: 15px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .search-container {
        margin-top: 10px;
        margin-bottom: 20px;
        text-align: center;
    }
    .search-box {
        width: 80%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 5px;
        display: inline-block;
        box-sizing: border-box;
    }
    .search-button {
        padding: 10px 20px;
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        display: inline-block;
    }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="#">Employee Database</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto"> <!-- ml-auto to align links to the right -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employees.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('create_department') }}">Create Department</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('create_designation') }}">Create Designation</a>
            </li>
        </ul>
    </div>
</nav>
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

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function handleDropdownSelection(dropdownId) {
        console.log('Dropdown ID:', dropdownId);
    if (dropdownId === 'new_department') {

        window.location.href = "{{ route('departments.create') }}";
    } else if (dropdownId === 'new_designation') {

        window.location.href = "{{ route('designations.create') }}";
    } else if (dropdownId === 'milestone2_redirect') {

            window.location.href = "{{ route('milestone2') }}";
        } else {
        var designationId = document.getElementById('designation_id').value;
        var departmentId = document.getElementById('department_id').value;


        document.getElementById('designation_name').value = $('#designation_id option:selected').text();
        document.getElementById('department_name').value = $('#department_id option:selected').text();
    }
    console.log('Designation ID:', designationId);
    console.log('Department ID:', departmentId);
}
</script>

</body>
</html>
