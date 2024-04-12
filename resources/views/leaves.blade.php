@include('components.header',['title' => 'Leaves'])
    <div class="container">
        <h2>Leaves</h2>

        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLeaves">
            Create Leave
        </button>

        <!-- Table to display data -->
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee</th>
                    <th>Start of Leave</th>
                    <th>End of Leave</th>
                    <th>Leave Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->employee->employee_number }}</td>
                    <td>{{ $leave->employee->firstname}} {{$leave->employee->lasttname}}</td>
                    <td>{{ $leave->start_leave }}</td>
                    <td>{{ $leave->end_leave }}</td>
                    <td>{{ $leave->leave_type }}</td>
                    <td>{{ $leave->status }}</td>
                    <td>
                        <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this leave?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for adding new employee -->
    <div class="modal" id="addLeaves" tabindex="-1" role="dialog" aria-labelledby="addLeaves" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLeaves">Add Leave</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding new leaves -->
                    <form action="{{ route('leaves.store') }}" method="POST">
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
                            <label for="start_leave">Start of Leave</label>
                            <input type="date" class="form-control" id="start_leave" name="start_leave" required>
                        </div>
                        <div class="form-group">
                            <label for="end_leave">End of Leave</label>
                            <input type="date" class="form-control" id="end_leave" name="end_leave" required>
                        </div>
                        <div class="form-group">
                            <label for="leave_type">Leave Type</label>
                            <input type="text" class="form-control" id="leave_type" name="leave_type">
                        </div>
                        <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" required>
                            </div>

                        <!-- Add other form fields as needed -->
                        <button type="submit" class="btn btn-primary">Add Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@include('components.footer')