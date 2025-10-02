@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Company</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('company.update', $company->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="organization_id">Organization</label>
                        <select class="form-control" id="organization_id" name="organization_id" required>
                            <option value="">Select Organization</option>
                            @foreach($organizations as $organization)
                                <option value="{{ $organization->id }}"
                                    {{ $company->organization_id == $organization->id ? 'selected' : '' }}>
                                    {{ $organization->org_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name"
                               value="{{ $company->company_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="company_contact_number">Contact Number</label>
                        <input type="text" class="form-control" id="company_contact_number" name="company_contact_number"
                               value="{{ $company->company_contact_number }}">
                    </div>

                    <div class="form-group">
                        <label for="company_email">Email</label>
                        <input type="email" class="form-control" id="company_email" name="company_email"
                               value="{{ $company->company_email }}">
                    </div>

                    <div class="form-group">
                        <label for="company_address">Address</label>
                        <input type="text" class="form-control" id="company_address" name="company_address"
                               value="{{ $company->company_address }}">
                    </div>

                    <div class="form-group">
                        <label for="company_status">Status</label>
                        <select class="form-control" id="company_status" name="company_status" required>
                            <option value="">Select Status</option>
                            <option value="active" {{ $company->company_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $company->company_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Company</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
