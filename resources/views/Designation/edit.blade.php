@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Designation</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('designation.update', $designation->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Company Dropdown --}}
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select class="form-control" id="company_id" name="company_id" required>
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ $designation->company_id == $company->id ? 'selected' : '' }}>
                                    {{ $company->company_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Department Dropdown --}}
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select class="form-control" id="department_id" name="department_id" required>
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $designation->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Designation Title --}}
                    <div class="form-group">
                        <label for="title">Designation Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                               value="{{ $designation->title }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Designation</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
