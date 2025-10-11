@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Provident Fund</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('providentfund.store') }}" method="POST">
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

                    {{-- Contribution Amount --}}
                    <div class="form-group">
                        <label for="contribution_amount">Contribution Amount</label>
                        <input type="number" step="0.01" name="contribution_amount" id="contribution_amount" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Provident Fund</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

