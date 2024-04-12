@include('components.header',['title' => 'Department Designation'])

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

@include('components.footer')