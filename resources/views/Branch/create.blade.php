@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Branch</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('branch.store') }}" method="POST">
                    @csrf

                    {{-- Company Dropdown --}}
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select class="form-control" id="company_id" name="company_id" required>
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Branch Name --}}
                    <div class="form-group">
                        <label for="branch_name">Branch Name</label>
                        <input type="text" class="form-control" id="branch_name" name="branch_name"
                               placeholder="Enter Branch Name" required>
                    </div>

                    {{-- Contact Number --}}
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number"
                               placeholder="Enter Contact Number">
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email">Branch Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="Enter Branch Email">
                    </div>

                    {{-- Location --}}
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location"
                               placeholder="Enter Location">
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Branch</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
