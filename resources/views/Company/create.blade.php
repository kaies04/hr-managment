@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Company</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('company.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="organization_id">Organization</label>
                        <select class="form-control" id="organization_id" name="organization_id" required>
                            <option value="">Select Organization</option>
                            @foreach($organizations as $organization)
                                <option value="{{ $organization->id }}">{{ $organization->org_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name"
                               placeholder="Enter Company Name" required>
                    </div>

                    <div class="form-group">
                        <label for="company_contact_number">Contact Number</label>
                        <input type="text" class="form-control" id="company_contact_number" name="company_contact_number"
                               placeholder="Enter Contact Number">
                    </div>

                    <div class="form-group">
                        <label for="company_email">Email</label>
                        <input type="email" class="form-control" id="company_email" name="company_email"
                               placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label for="company_address">Address</label>
                        <input type="text" class="form-control" id="company_address" name="company_address"
                               placeholder="Enter Address">
                    </div>

                    <div class="form-group">
                        <label for="company_status">Status</label>
                        <select class="form-control" id="company_status" name="company_status" required>
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Company</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
