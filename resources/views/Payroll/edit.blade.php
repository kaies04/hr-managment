@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Payroll</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('payroll.update', $payroll->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Employee Dropdown --}}
                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" 
                                    {{ $payroll->employee_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Month --}}
                    <div class="form-group">
                        <label for="month">Month</label>
                        <input type="text" class="form-control" id="month" name="month"
                               value="{{ $payroll->month }}" required>
                    </div>

                    {{-- Year --}}
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" class="form-control" id="year" name="year"
                               value="{{ $payroll->year }}" required>
                    </div>

                    {{-- Basic Salary --}}
                    <div class="form-group">
                        <label for="basic_salary">Basic Salary</label>
                        <input type="number" step="0.01" class="form-control" id="basic_salary" 
                               name="basic_salary" value="{{ $payroll->basic_salary }}" required>
                    </div>

                    {{-- Allowances --}}
                    <div class="form-group">
                        <label for="allowances">Allowances</label>
                        <input type="number" step="0.01" class="form-control" id="allowances" 
                               name="allowances" value="{{ $payroll->allowances }}" required>
                    </div>

                    {{-- Deductions --}}
                    <div class="form-group">
                        <label for="deductions">Deductions</label>
                        <input type="number" step="0.01" class="form-control" id="deductions" 
                               name="deductions" value="{{ $payroll->deductions }}" required>
                    </div>

                    {{-- Bonuses --}}
                    <div class="form-group">
                        <label for="bonuses">Bonuses</label>
                        <input type="number" step="0.01" class="form-control" id="bonuses" 
                               name="bonuses" value="{{ $payroll->bonuses }}" required>
                    </div>

                    {{-- Net Salary --}}
                    <div class="form-group">
                        <label for="net_salary">Net Salary</label>
                        <input type="number" step="0.01" class="form-control" id="net_salary" 
                               name="net_salary" value="{{ $payroll->net_salary }}" required>
                    </div>

                    {{-- Generated At --}}
                    <div class="form-group">
                        <label for="generated_at">Generated At</label>
                        <input type="datetime-local" class="form-control" id="generated_at" 
                               name="generated_at" value="{{ $payroll->generated_at ? $payroll->generated_at->format('Y-m-d\TH:i') : '' }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Payroll</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

