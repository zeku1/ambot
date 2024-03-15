<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table, th, td {
            justify-content: center;
            align-items: center;
        }
        .container {
            max-width: 2400px;
            margin: 0 auto;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Employee Database</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('designations.create') }}">Create Designation</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('departments.create') }}">Create Department</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('milestone2') }}">Create Employee</a>
        </li>
        </ul>
    </div>
</nav>

@yield('content')


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function handleDropdownSelection(dropdownId) {
    if (dropdownId === 'new_department') {

        window.location.href = "{{ route('departments.create') }}";
    } else if (dropdownId === 'new_designation') {

        window.location.href = "{{ route('designations.create') }}";
    }else if (dropdownId === 'milestone2_redirect') {

            window.location.href = "{{ route('milestone2') }}";
        }
}
</script>

</body>
</html>
