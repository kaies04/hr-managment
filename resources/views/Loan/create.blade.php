@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Loan Record</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('loan.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select name="employee_id" id="employee_id" class="form-control" required>
                            <option value="">-- Select Employee --</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="loan_amount">Loan Amount</label>
                        <input type="number" step="0.01" name="loan_amount" id="loan_amount" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="monthly_installment">Monthly Installment</label>
                        <input type="number" step="0.01" name="monthly_installment" id="monthly_installment" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="remaining_balance">Remaining Balance</label>
                        <input type="number" step="0.01" name="remaining_balance" id="remaining_balance" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Active">Active</option>
                            <option value="Cleared">Cleared</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Add Loan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

