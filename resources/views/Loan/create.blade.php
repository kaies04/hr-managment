@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Loan Record</h2>
            </div>
           @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
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
                        @error('employee_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="loan_amount">Loan Amount</label>
                        <input type="number" step="0.01" name="loan_amount" id="loan_amount" class="form-control" required>
                        @error('loan_amount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="number_of_installment">Number of Installment</label>
                        <input type="number" step="0.01" name="number_of_installment" id="number_of_installment" class="form-control" required>
                        @error('number_of_installment')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="finish_date">finish Date</label>
                        <input type="date" name="finish_date" id="finish_date" class="form-control" required>
                        @error('finish_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="monthly_installment">Monthly Installment</label>
                        <input type="number" step="0.01" name="monthly_installment" id="monthly_installment" class="form-control" required>
                        @error('monthly_installment')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Active">Active</option>
                            <option value="Cleared">Cleared</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Add Loan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('loan_amount').addEventListener('input', calculateMonthlyInstallment);
    document.getElementById('number_of_installment').addEventListener('input', calculateMonthlyInstallment);
    function calculateMonthlyInstallment() {
        const loanAmount = parseFloat(document.getElementById('loan_amount').value) || 0;
        const numberOfInstallment = parseInt(document.getElementById('number_of_installment').value) || 1;
        const monthlyInstallment = loanAmount / numberOfInstallment;
        document.getElementById('monthly_installment').value = monthlyInstallment.toFixed(2);
    }
    document.getElementById('start_date').addEventListener('change', setFinishDate);
    document.getElementById('number_of_installment').addEventListener('input', setFinishDate);
    function setFinishDate() {
        const startDate = new Date(document.getElementById('start_date').value);
        const numberOfInstallment = parseInt(document.getElementById('number_of_installment').value) || 0;
        if (startDate && numberOfInstallment > 0) {
            const finishDate = new Date(startDate);
            finishDate.setMonth(finishDate.getMonth() + numberOfInstallment);
            const year = finishDate.getFullYear();
            const month = String(finishDate.getMonth() + 1).padStart(2, '0');
            const day = String(finishDate.getDate()).padStart(2, '0');
            document.getElementById('finish_date').value = `${year}-${month}-${day}`;
        } else {
            document.getElementById('finish_date').value = '';
        }
    }
</script>
@endpush

