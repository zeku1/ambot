<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

</body>
</html>