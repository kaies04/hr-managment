@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Bonus</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('bonus.update', $bonus->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Employee Dropdown --}}
                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" 
                                    {{ $bonus->employee_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Bonus Type --}}
                    <div class="form-group">
                        <label for="type">Bonus Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="Festival" {{ $bonus->type == 'Festival' ? 'selected' : '' }}>Festival</option>
                            <option value="Motivational" {{ $bonus->type == 'Motivational' ? 'selected' : '' }}>Motivational</option>
                        </select>
                    </div>

                    {{-- Amount --}}
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount"
                               value="{{ $bonus->amount }}" required>
                    </div>

                    {{-- Date --}}
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" 
                               value="{{ $bonus->date->format('Y-m-d') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Bonus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

