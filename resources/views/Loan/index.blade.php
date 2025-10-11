@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Loan List</h2>
                <a class="btn btn-primary btn-sm" href="{{ route('loan.create') }}">Add Loan</a>
            </div>
            <div class="card-body">
                <table id="loanTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            <th>Loan Amount</th>
                            <th>Monthly Installment</th>
                            <th>Remaining Balance</th>
                            <th>Start Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $loan)
                        <tr>
                            <td>{{ $loan->id }}</td>
                            <td>{{ $loan->employee->name ?? 'N/A' }}</td>
                            <td>{{ $loan->loan_amount }}</td>
                            <td>{{ $loan->monthly_installment }}</td>
                            <td>{{ $loan->remaining_balance }}</td>
                            <td>{{ $loan->start_date->format('d M Y') }}</td>
                            <td>{{ $loan->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                       id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('loan.edit', $loan->id) }}">Edit</a>
                                        <form action="{{ route('loan.destroy', $loan->id) }}" method="POST" class="d-inline">
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
                            <td colspan="8" class="text-center">No Loans Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
