@include('components.header',['title' => 'Department'])

    <div class="container">

        <h2>Create New Department</h2>

        <form action="{{ route('departments.store') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="department_name">Department Name</label>

                <input type="text" class="form-control" id="department_name" name="department_name" required>

            </div>

            <div class="form-group">

                <label for="status">Status</label>

                <select class="form-control" id="status" name="status" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>

            </div>

            <button type="submit" class="btn btn-primary">Create Department</button>

        </form>

    </div>
@include('components.footer')
