@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Loan</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('loan.update', $loan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Employee Dropdown --}}
                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" 
                                    {{ $loan->employee_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Loan Amount --}}
                    <div class="form-group">
                        <label for="loan_amount">Loan Amount</label>
                        <input type="number" step="0.01" class="form-control" id="loan_amount" name="loan_amount"
                               value="{{ $loan->loan_amount }}" required>
                    </div>

                    {{-- Monthly Installment --}}
                    <div class="form-group">
                        <label for="monthly_installment">Monthly Installment</label>
                        <input type="number" step="0.01" class="form-control" id="monthly_installment" 
                               name="monthly_installment" value="{{ $loan->monthly_installment }}" required>
                    </div>

                    {{-- Remaining Balance --}}
                    <div class="form-group">
                        <label for="remaining_balance">Remaining Balance</label>
                        <input type="number" step="0.01" class="form-control" id="remaining_balance" 
                               name="remaining_balance" value="{{ $loan->remaining_balance }}" required>
                    </div>

                    {{-- Start Date --}}
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" 
                               value="{{ $loan->start_date->format('Y-m-d') }}" required>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Active" {{ $loan->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Cleared" {{ $loan->status == 'Cleared' ? 'selected' : '' }}>Cleared</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Loan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

