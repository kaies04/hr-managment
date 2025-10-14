@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Payroll List</h2>
                <a class="btn btn-primary btn-sm" href="{{ route('payroll.create') }}">Add Payroll</a>
            </div>
            <div class="card-body">
                <table id="payrollTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Basic Salary</th>
                            <th>Absent</th>
                            <th>Absent Deductions</th>
                            <th>Loan Deductions</th>
                            <th>Allowances</th>
                            <th>Bonuses</th>
                            <th>Net Salary</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Generated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $payroll)
                        <tr>
                            <td>{{ $payroll->id }}</td>
                            <td>{{ $payroll->employee->name ?? 'N/A' }}</td>
                            <td>{{ $payroll->month }}</td>
                            <td>{{ $payroll->year }}</td>
                            <td>{{ $payroll->basic_salary }}</td>
                            <td>{{ $payroll->total_absent }}</td>
                            <td>{{ $payroll->deduction_for_absent }}</td>
                            <td>{{ $payroll->loan_deduction }}</td>
                            <td>{{ $payroll->allowances }}</td>
                            <td>{{ $payroll->bonuses }}</td>
                            <td>{{ $payroll->net_salary }}</td>
                            <td>{{ $payroll->payment_status }}</td>
                            <td>{{ $payroll->status }}</td>
                            <td>{{ $payroll->remarks }}</td>
                            <td>{{ $payroll->created_at ? $payroll->created_at->format('d M Y H:i') : 'N/A' }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                       id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('payroll.show', $payroll->id) }}">Show</a>
                                        <a class="dropdown-item" href="{{ route('payroll.edit', $payroll->id) }}">Edit</a>
                                        <form action="{{ route('payroll.destroy', $payroll->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center">No Payroll Records Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
