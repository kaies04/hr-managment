@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-default">
      <div class="card-header">
        <h2>Add Bonus</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('bonus.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <label for="employee_id">Select Employee</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
              <option value="">-- Select Employee --</option>
              @foreach ($employees as $employee)
                  <option value="{{ $employee->id }}">{{ $employee->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="type">Bonus Type</label>
            <select name="type" id="type" class="form-control">
              <option value="Festival">Festival</option>
              <option value="Motivational">Motivational</option>
            </select>
          </div>

          <div class="form-group">
            <label for="amount">Bonus Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
          </div>

          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
          </div>

          <button type="submit" class="btn btn-primary">Add Bonus</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

