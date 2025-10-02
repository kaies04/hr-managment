@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Organization</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('organization.update', $organization->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="org_name">Organization Name</label>
                            <input type="text" class="form-control" id="org_name" name="org_name"
                                   placeholder="Enter Organization Name" required value="{{ $organization->org_name }}">
                        </div>

                        <div class="form-group">
                            <label for="org_contact_number">Contact Number</label>
                            <input type="text" class="form-control" id="org_contact_number" name="org_contact_number"
                                   placeholder="Enter Contact Number" value="{{ $organization->org_contact_number }}">
                        </div>

                        <div class="form-group">
                            <label for="org_email">Email</label>
                            <input type="email" class="form-control" id="org_email" name="org_email"
                                   placeholder="Enter Email" value="{{ $organization->org_email }}">
                        </div>

                        <div class="form-group">
                            <label for="subscription_plan">Subscription Plan</label>
                            <input type="text" class="form-control" id="subscription_plan" name="subscription_plan"
                                   placeholder="Enter Subscription Plan" value="{{ $organization->subscription_plan }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="active" {{ $organization->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $organization->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Organization</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection






{{-- @extends('layouts.app')

@section('content') --}}
{{-- <div class="container">
    <h2>Edit Organization</h2>

    <form action="{{ route('organization.update', $organization->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $organization->name }}" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $organization->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contact Number</label>
            <input type="text" name="contact_number" value="{{ $organization->contact_number }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Subscription Plan</label>
            <input type="text" name="subscription_plan" value="{{ $organization->subscription_plan }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $organization->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $organization->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div> --}}
{{-- @endsection --}}
