@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Attendance</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Employee Dropdown --}}
                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" 
                                    {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Date --}}
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" 
                               value="{{ $attendance->date->format('Y-m-d') }}" required>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="Present" {{ $attendance->status == 'Present' ? 'selected' : '' }}>Present</option>
                            <option value="Absent" {{ $attendance->status == 'Absent' ? 'selected' : '' }}>Absent</option>
                            <option value="Leave" {{ $attendance->status == 'Leave' ? 'selected' : '' }}>Leave</option>
                            <option value="Late" {{ $attendance->status == 'Late' ? 'selected' : '' }}>Late</option>
                            <option value="Half-day" {{ $attendance->status == 'Half-day' ? 'selected' : '' }}>Half-day</option>
                        </select>
                    </div>

                    {{-- Check In --}}
                    <div class="form-group">
                        <label for="check_in">Check In</label>
                        <input type="time" class="form-control" id="check_in" name="check_in" 
                               value="{{ $attendance->check_in ? $attendance->check_in->format('H:i') : '' }}">
                    </div>

                    {{-- Check Out --}}
                    <div class="form-group">
                        <label for="check_out">Check Out</label>
                        <input type="time" class="form-control" id="check_out" name="check_out" 
                               value="{{ $attendance->check_out ? $attendance->check_out->format('H:i') : '' }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Attendance</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

