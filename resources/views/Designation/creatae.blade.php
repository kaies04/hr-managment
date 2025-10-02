@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Designation</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('designation.store') }}" method="POST">
                    @csrf

                    {{-- Company Dropdown --}}
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select class="form-control" id="company_id" name="company_id" required>
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Department Dropdown --}}
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select class="form-control" id="department_id" name="department_id" required>
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Designation Title --}}
                    <div class="form-group">
                        <label for="title">Designation Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                               placeholder="Enter Designation Title" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Designation</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
