
@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Attendance</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('attendance.store') }}" method="POST">
                    @csrf

                    {{-- Date --}}
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>In Time</th>
                            <th>Out Time</th>
                            <th>Status</th>
                        </tr>
                        @forelse ($employees as $emp)
                        <tr>
                            <td>
                                {{ $emp->name }}
                                <input type="hidden" name="employee_id[{{ $emp->id }}]" value="{{ $emp->id }}">
                            </td>
                            <td><input type="time" name="check_in[{{$emp->id}}]" id="check_in_{{ $emp->id }}" class="form-control"></td>
                            <td><input type="time" name="check_out[{{$emp->id}}]" id="check_out_{{ $emp->id }}" class="form-control"></td>
                            <td>
                                <select name="status[{{$emp->id}}]" id="status_{{ $emp->id }}" class="form-control" required>
                                    <option value="0">Present</option>
                                    <option value="1">Absent</option>
                                    <option value="2">Leave</option>
                                    <option value="3">Late</option>
                                    <option value="4">Half-day</option>
                                </select>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </table>

                    <button type="submit" class="btn btn-primary">Add Attendance</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('date').addEventListener('change', function() {
        const date = this.value;
        @foreach ($employees as $emp)
            fetch(`{{ route('attendancecheckLeave', ['employeeId' => $emp->id]) }}&date=${date}`)
                .then(response => response.json())
                .then(data => {
                    if (data.leave_type !== null) {
                        document.querySelector(`select[id="status_{{ $emp->id }}"]`).value = 2; // Set to 'Leave'
                        document.querySelector(`select[id="check_in_{{ $emp->id }}"]`).value = '';
                        document.querySelector(`select[id="check_out_{{ $emp->id }}"]`).value = '';
                    }else{
                        document.querySelector(`select[id="status_{{ $emp->id }}"]`).value = 0; // Set to 'Present'
                    }
                });
        @endforeach
    });
</script>
@endpush
