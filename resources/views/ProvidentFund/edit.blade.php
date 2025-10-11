@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Provident Fund</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('providentfund.update', $providentFund->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Employee Dropdown --}}
                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" 
                                    {{ $providentFund->employee_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Month --}}
                    <div class="form-group">
                        <label for="month">Month</label>
                        <input type="text" class="form-control" id="month" name="month"
                               value="{{ $providentFund->month }}" required>
                    </div>

                    {{-- Year --}}
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" class="form-control" id="year" name="year"
                               value="{{ $providentFund->year }}" required>
                    </div>

                    {{-- Contribution Amount --}}
                    <div class="form-group">
                        <label for="contribution_amount">Contribution Amount</label>
                        <input type="number" step="0.01" class="form-control" id="contribution_amount" 
                               name="contribution_amount" value="{{ $providentFund->contribution_amount }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Provident Fund</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

