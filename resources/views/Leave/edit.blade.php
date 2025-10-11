@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Leave</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('leave.update', $leave->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Employee Dropdown --}}
                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ $leave->employee_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Leave Type --}}
                    <div class="form-group">
                        <label for="leave_type">Leave Type</label>
                        <select class="form-control" id="leave_type" name="leave_type" required>
                            <option value="">Select Leave Type</option>
                            <option value="0" {{ $leave->leave_type == '0' ? 'selected' : '' }}>Casual</option>
                            <option value="1" {{ $leave->leave_type == '1' ? 'selected' : '' }}>Sick</option>
                            <option value="2" {{ $leave->leave_type == '2' ? 'selected' : '' }}>Unpaid</option>
                        </select>
                    </div>

                    {{-- Start Date --}}
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date"
                               value="{{ $leave->start_date->format('Y-m-d') }}" required>
                    </div>

                    {{-- End Date --}}
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"
                               value="{{ $leave->end_date->format('Y-m-d') }}" required>
                    </div>
                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="0" {{ $leave->status == '0' ? 'selected' : '' }}>Pending</option>
                            <option value="1" {{ $leave->status == '1' ? 'selected' : '' }}>Approved</option>
                            <option value="2" {{ $leave->status == '2' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Leave</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

