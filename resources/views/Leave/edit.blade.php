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
                            <option value="Casual" {{ $leave->leave_type == 'Casual' ? 'selected' : '' }}>Casual</option>
                            <option value="Sick" {{ $leave->leave_type == 'Sick' ? 'selected' : '' }}>Sick</option>
                            <option value="Unpaid" {{ $leave->leave_type == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
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

