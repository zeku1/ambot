@include('components.header',['title' => 'Deductions'])
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

@include('components.footer')
