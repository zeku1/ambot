<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments and Designations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        body {
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            margin-top: 20px;
        }
        .container {
            max-width: 2400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Departments</h2>

    <!-- Table to display departments -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td>{{ $department->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Designations</h2>

    <!-- Table to display designations -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Designation Name</th>
                <th>Department ID</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($designations as $designation)
                <tr>
                    <td>{{ $designation->id }}</td>
                    <td>{{ $designation->designation_name }}</td>
                    <td>{{ $designation->department_id }}</td>
                    <td>{{ $designation->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
