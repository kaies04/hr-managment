@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Attendance</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('attendance.store') }}" method="POST">
                    @csrf
                    {{-- Date --}}
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date"
                               value="{{ $attendance->date }}" required>
                    </div>

                    {{-- Employee Dropdown --}}
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

                    <button type="submit" class="btn btn-primary">Update Attendance</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.onload = function() {
        const date = document.getElementById('date').value;
        @foreach ($employees as $emp)
            fetch(`{{ route('attendancegetAttendance', ['employeeId' => $emp->id]) }}&date=${date}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        document.getElementById('check_in_{{ $emp->id }}').value = data.check_in ? data.check_in : '';
                        document.getElementById('check_out_{{ $emp->id }}').value = data.check_out ? data.check_out : '';
                        document.getElementById('status_{{ $emp->id }}').value = data.status;
                    }
                })
                .catch(error => console.error('Error fetching attendance:', error));
        @endforeach
    };
</script>
@endpush

