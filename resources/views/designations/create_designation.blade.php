@include('components.header',['title' => 'Designation'])
    <div class="container">
        <h2>Create New Designation</h2>
        <form action="{{ route('designations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="designation_name">Designation Name</label>
                <input type="text" class="form-control" id="designation_name" name="designation_name" required>
            </div>

            <div class="form-group">
                <label for="department_id">Department</label>
                <select class="form-control" id="department_id" name="department_id" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Designation</button>

        </form>
        
    </div>
@include('components.footer')
