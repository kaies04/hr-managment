@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Payroll</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('payroll.store') }}" method="POST">
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

                    {{-- Month --}}
                    <div class="form-group">
                        <label for="month">Month</label>
                        <select name="month" id="month" class="form-control" required>
                            @foreach ([
                                'January','February','March','April','May','June',
                                'July','August','September','October','November','December'
                            ] as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Year --}}
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" name="year" id="year" class="form-control" value="{{ date('Y') }}" required>
                    </div>

                    {{-- Basic Salary --}}
                    <div class="form-group">
                        <label for="basic_salary">Basic Salary</label>
                        <input type="number" name="basic_salary" id="basic_salary" step="0.01" class="form-control" required>
                    </div>

                    {{-- Allowances --}}
                    <div class="form-group">
                        <label for="allowances">Allowances</label>
                        <input type="number" name="allowances" id="allowances" step="0.01" class="form-control">
                    </div>

                    {{-- Deductions --}}
                    <div class="form-group">
                        <label for="deductions">Deductions</label>
                        <input type="number" name="deductions" id="deductions" step="0.01" class="form-control">
                    </div>

                    {{-- Bonuses --}}
                    <div class="form-group">
                        <label for="bonuses">Bonuses</label>
                        <input type="number" name="bonuses" id="bonuses" step="0.01" class="form-control">
                    </div>

                    {{-- Net Salary --}}
                    <div class="form-group">
                        <label for="net_salary">Net Salary</label>
                        <input type="number" name="net_salary" id="net_salary" step="0.01" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Payroll</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
