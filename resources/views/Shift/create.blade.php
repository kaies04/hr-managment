@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Shift</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('shift.store') }}" method="POST">
                    @csrf

                    {{-- Company --}}
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select class="form-control" id="company_id" name="company_id" required>
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Shift Name --}}
                    <div class="form-group">
                        <label for="name">Shift Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Shift Name" required>
                    </div>

                    {{-- Start Time --}}
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" required>
                    </div>

                    {{-- End Time --}}
                    <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Shift</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
