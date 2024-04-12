<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @isset($title)
            EDP | {{ $title }}
        @else
            EDP
        @endisset
    </title>
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
                    <a class="nav-link" href="{{ route('departments.create') }}">Create Department</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('designations.create') }}">Create Designation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaves.index') }}">Leaves</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('earnings.index') }}">Earnings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('deductions.index') }}">Deductions</a>
                </li>
            </ul>
        </div>
    </nav>