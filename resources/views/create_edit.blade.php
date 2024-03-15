<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        body {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Employee</h2>

    <!-- Form for editing employee details -->
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employee_number">Employee Number</label>
            <input type="text" class="form-control" id="employee_number" name="employee_number" value="{{ $employee->employee_number }}" required>
        </div>

        <div class="form-group">
            <label for="middlename">Middle Name</label>
            <input type="text" class="form-control" id="middlename" name="middlename" value="{{ $employee->middlename }}" required>
        </div>

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $employee->firstname }}" required>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $employee->lastname }}" required>
        </div>

        <div class="form-group">
            <label for="addressline">Address Line</label>
            <input type="text" class="form-control" id="addressline" name="addressline" value="{{ $employee->addressline }}" required>
        </div>
        
        <div class="form-group">
            <label for="barangay">Barangay</label>
            <input type="text" class="form-control" id="barangay" name="barangay" value="{{ $employee->barangay }}" required>
        </div>

        <div class="form-group">
            <label for="province">Province</label>
            <input type="text" class="form-control" id="province" name="province" value="{{ $employee->province }}" required>
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" value="{{ $employee->country }}" required>
        </div>

        <div class="form-group">
            <label for="zipcode">Zip Code</label>
            <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $employee->zipcode }}" required>
        </div>

        <!-- Dropdown for Department -->
        <div class="form-group">
            <label for="department_id">Department</label>
            <select class="form-control" id="department_id" name="department_id" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $department->id == $employee->department_id ? 'selected' : '' }}>{{ $department->department_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown for Designation -->
        <div class="form-group">
            <label for="designation_id">Designation</label>
            <select class="form-control" id="designation_id" name="designation_id" required>
                @foreach($designations as $designation)
                    <option value="{{ $designation->id }}" {{ $designation->id == $employee->designation_id ? 'selected' : '' }}>{{ $designation->designation_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown for Employee Type -->
        <div class="form-group">
            <label for="employee_type">Employee Type</label>
            <select class="form-control" id="employee_type" name="employee_type" required>
                <option value="Full Time" {{ $employee->employee_type == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                <option value="Part Time" {{ $employee->employee_type == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                <!-- Add other options as needed -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
