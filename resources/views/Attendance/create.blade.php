
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

                    {{-- Employee --}}
                    <div class="form-group">
                        <label for="employee_id">Select Employee</label>
                        <select name="employee_id" id="employee_id" class="form-control" required>
                            <option value="">-- Choose Employee --</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Date --}}
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                            <option value="Leave">Leave</option>
                            <option value="Late">Late</option>
                            <option value="Half-day">Half-day</option>
                        </select>
                    </div>

                    {{-- Check-in --}}
                    <div class="form-group">
                        <label for="check_in">Check In</label>
                        <input type="time" name="check_in" id="check_in" class="form-control">
                    </div>

                    {{-- Check-out --}}
                    <div class="form-group">
                        <label for="check_out">Check Out</label>
                        <input type="time" name="check_out" id="check_out" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Add Attendance</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
