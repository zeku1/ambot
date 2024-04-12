
@include('components.header',['title' => 'Earnings'])

    <div class="container">
    <h2>Earnings</h2>

    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEarnings">
    Create Earnings
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
                @foreach($earnings as $earning)
                <tr>
                    <td>{{ $earning->employee->employee_number }}</td>
                    <td>{{ $earning->employee->firstname}} {{$earning->employee->lasttname}}</td>
                    <td>{{ $earning->type_of_earnings }}</td>
                    <td>{{ $earning->amount }}</td>
                    <td>{{ $earning->date }}</td>
                    <td>
                        <form action="{{ route('earnings.destroy', $earning->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this earning?')">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>

<!-- Modal for adding new employee -->
<div class="modal" id="addEarnings" tabindex="-1" role="dialog" aria-labelledby="addEarnings" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEarnings">Add Earnings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding new leaves -->
                <form action="{{ route('earnings.store') }}" method="POST">
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
                        <label for="start_leave">Type of Earnings</label>
                        <input type="text" class="form-control" id="type_of_earnings" name="type_of_earnings" required>
                    </div>
                    <div class="form-group">
                        <label for="end_leave">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="end_leave">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Earning</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
