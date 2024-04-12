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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaves.create') }}">Leaves</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('earnings.create') }}">Earnings</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('deductions.create') }}">Deductions</a>
            </li>
            </ul>
        </div>
    </nav>

    <div class="container">
    <h2>Deductions</h2>

    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDeductions">
    Create Deductions
    </button>


        <!-- Table to display data -->
        <table class="table mt-3">
        <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>

                </tr>
            </thead>
            <tbody>
                @foreach($deductions as $deduction)
                <tr>
                    <td>{{ $deduction->employee->employee_number }}</td>
                    <td>{{ $deduction->employee->firstname}} {{$deduction->employee->lasttname}}</td>
                    <td>{{ $deduction->type_of_deductions }}</td>
                    <td>{{ $deduction->amount }}</td>
                    <td>{{ $deduction->date }}</td>
                    <td>
                        <form action="{{ route('deductions.destroy', $deduction->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this deduction?')">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>

<!-- Modal for adding new employee -->
<div class="modal" id="addDeductions" tabindex="-1" role="dialog" aria-labelledby="addDeductions" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDeductions">Add Deductions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding new leaves -->
<form action="{{ route('deductions.store') }}" method="POST">
    @csrf
        <!-- Dropdown for Employee -->
<div class="form-group">
    <label for="employees_id">Employee</label>
    <select class="form-control" id="employees_id" name="employees_id" required>
        <option value="" disabled selected>Select Employee</option>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->firstname }} {{ $employee->lastname}}</option>
        @endforeach
    </select>
</div>


                   <div class="form-group">
                       <label for="start_leave">Type of Deductions</label>
                       <input type="text" class="form-control" id="type_of_deductions" name="type_of_deductions" required>
                   </div>
                       <div class="form-group">
                           <label for="end_leave">Amount</label>
                           <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="form-group">
                           <label for="end_leave">Date</label>
                           <input type="date" class="form-control" id="date" name="date" required>
                        </div>

    <!-- Add other form fields as needed -->
                    <button type="submit" class="btn btn-primary">Add Deduction</button>
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
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif  
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#employees_id').select2({
                placeholder: "Search for an employee",
                allowClear: true
            });
        });
    </script>
@endpush

    </body>
