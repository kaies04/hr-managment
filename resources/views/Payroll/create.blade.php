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
                    {{-- Month --}}
                    <div class="form-group">
                        <label for="month">Month</label>
                        <select name="month" id="month" class="form-control" required>
                            @foreach ([
                                1=>'January','February','March','April','May','June',
                                'July','August','September','October','November','December'
                            ] as $i=>$month)
                                <option value="{{ $i }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Year --}}
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" name="year" id="year" class="form-control" value="{{ date('Y') }}" required>
                    </div>

                    <table class="table">
                        <tr>
                            <th>Employee</th>
                            <th>Basic Salary</th>
                            <th>Absent</th>
                            <th>Absent deduction</th>
                            <th>Loan deduction</th>
                            <th>Allowances</th>
                            <th>Deductions</th>
                            <th>Bonuses</th>
                            <th>Net Salary</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Remarks</th>
                        </tr>
                        @forelse($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td><input onchange="calculateNetSalary({{ $employee->id }})" type="text" name="basic_salary_{{ $employee->id }}" value="{{ $employee->salary->basic_salary }}" class="form-control" required></td>
                            <td><input onchange="calculateNetSalary({{ $employee->id }})" type="text" name="total_absent_{{ $employee->id }}" class="form-control" value="0" required></td>
                            <td><input onchange="calculateNetSalary({{ $employee->id }})" type="text" name="deduction_for_absent_{{ $employee->id }}" class="form-control" value="0" required></td>
                            <td><input onchange="calculateNetSalary({{ $employee->id }})" type="text" name="loan_deduction_{{ $employee->id }}" value="{{ $employee->active_loan?->monthly_installment }}" class="form-control" value="0" required></td>
                            <td><input onchange="calculateNetSalary({{ $employee->id }})" type="text" name="allowances_{{ $employee->id }}" step="0.01" class="form-control" value="0"></td>
                            <td><input onchange="calculateNetSalary({{ $employee->id }})" type="text" name="deductions_{{ $employee->id }}" step="0.01" class="form-control" value="0"></td>
                            <td><input onchange="calculateNetSalary({{ $employee->id }})" type="text" name="bonuses_{{ $employee->id }}" step="0.01" class="form-control" value="0"></td>
                            <td><input type="text" name="net_salary_{{ $employee->id }}" step="0.01" class="form-control" required></td>
                            <td>
                                <select name="payment_status_{{ $employee->id }}" class="form-control" required>
                                    <option value="0">Unpaid</option>
                                    <option value="1">Paid</option>
                                </select>
                            </td>
                            <td>
                                <select name="status_{{ $employee->id }}" class="form-control" required>
                                    <option value="0">Regular</option>
                                    <option value="1">Hold</option>
                                </select>
                            </td>
                            <td><input type="text" name="remarks_{{ $employee->id }}" class="form-control"></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12" class="text-center">No employees found.</td>
                        </tr>
                        @endforelse
                    </table>
                    
                    <button type="submit" class="btn btn-primary">Add Payroll</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function fetchEmployeeAbsent(employeeId, month, year) {
        return fetch(`{{ route('get_employee_absent') }}?employee_id=${employeeId}&month=${month}&year=${year}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(function(data) {
            return data.absent_days;
        })
        .catch(error => {
            console.error('Error fetching absent days:', error);
            return 0; // Default to 0 absent days on error
        });
        
    }

    async function updateAbsentDays(month, year) {
        @forelse($employees as $employee)
        var employeeId = {{ $employee->id }};
        var absentDays = await fetchEmployeeAbsent(employeeId, month, year);
        var loanDeduction = await fetchLoanInstallment(employeeId, month, year);
        //console.log(`Loan deduction for employee ${employeeId}:`, loanDeduction);
        var loanInput = document.querySelector(`input[name="loan_deduction_${employeeId}"]`);
        if (loanInput) {
            loanInput.value = loanDeduction;
        }
        
        // Update the input field for the employee
        var absentInput = document.querySelector(`input[name="total_absent_${employeeId}"]`);
        if (absentInput) {
            basic_salary=parseFloat({{ $employee->salary->basic_salary }});
            absentInput.value = absentDays;
            var perDaySalary = basic_salary / 30; // Assuming 30 days in a month
            var deduction = perDaySalary * absentDays;
            var deductionInput = document.querySelector(`input[name="deduction_for_absent_${employeeId}"]`);
            if (deductionInput) {
                deductionInput.value = deduction.toFixed(2);
            }
        }
        calculateNetSalary(employeeId);
        @empty
        console.warn('No employees found to update absent days.');
        @endforelse
    }

    document.getElementById('month').addEventListener('change', function() {
        const month = this.value;
        const year = document.getElementById('year').value;
        updateAbsentDays(month, year);
    });

    document.getElementById('year').addEventListener('change', function() {
        const year = this.value;
        const month = document.getElementById('month').value;
        updateAbsentDays(month, year);
    });

    // Initial load
    function fetchLoanInstallment(employeeId, month, year) {
        return fetch(`{{ route('monthly_loan_deduction') }}?employee_id=${employeeId}&month=${month}&year=${year}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(function(data) {
            return data.loan_deduction;
        })
        .catch(error => {
            console.error('Error fetching loan installment:', error);
            return 0; // Default to 0 on error
        });
    }

    function calculateNetSalary(emp_id){
        // get all input values
        let basic_salary = parseFloat(document.querySelector(`input[name="basic_salary_${emp_id}"]`).value) || 0;
        let deduction_for_absent = parseFloat(document.querySelector(`input[name="deduction_for_absent_${emp_id}"]`).value) || 0;
        let loan_deduction = parseFloat(document.querySelector(`input[name="loan_deduction_${emp_id}"]`).value) || 0;
        let allowances = parseFloat(document.querySelector(`input[name="allowances_${emp_id}"]`).value) || 0;
        let deductions = parseFloat(document.querySelector(`input[name="deductions_${emp_id}"]`).value) || 0;
        let bonuses = parseFloat(document.querySelector(`input[name="bonuses_${emp_id}"]`).value) || 0;

        // calculate net salary
        let net_salary = basic_salary - deduction_for_absent - loan_deduction + allowances - deductions + bonuses;

        // update net salary input field
        document.querySelector(`input[name="net_salary_${emp_id}"]`).value = net_salary.toFixed(2);
    }
</script>
@endpush
