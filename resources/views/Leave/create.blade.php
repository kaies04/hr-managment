@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Leave</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('leave.store') }}" method="POST">
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

                    {{-- Leave Type --}}
                    <div class="form-group">
                        <label for="leave_type">Leave Type</label>
                        <select name="leave_type" id="leave_type" class="form-control" required>
                            <option value="Casual">Casual</option>
                            <option value="Sick">Sick</option>
                            <option value="Unpaid">Unpaid</option>
                        </select>
                    </div>

                    {{-- Start Date --}}
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>

                    {{-- End Date --}}
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Leave</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

