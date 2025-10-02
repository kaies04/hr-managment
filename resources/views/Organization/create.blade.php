{{-- @extends('layouts.app')

@section('content') --}}





{{-- <div class="container">
    <h2>Create Organization</h2>

    <form action="{{ route('organization.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contact Number</label>
            <input type="text" name="contact_number" class="form-control">
        </div>

        <div class="mb-3">
            <label>Subscription Plan</label>
            <input type="text" name="subscription_plan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div> --}}
{{-- @endsection --}}
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Add Organization</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('organization.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="org_name">Organization Name</label>
                            <input type="text" class="form-control" id="org_name" name="org_name"
                                placeholder="Enter Organization Name" required>
                        </div>

                        <div class="form-group">
                            <label for="org_contact_number">Contact Number</label>
                            <input type="text" class="form-control" id="org_contact_number" name="org_contact_number"
                                placeholder="Enter Contact Number">
                        </div>

                        <div class="form-group">
                            <label for="org_email">Email</label>
                            <input type="email" class="form-control" id="org_email" name="org_email"
                                placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="subscription_plan">Subscription Plan</label>
                            <input type="text" class="form-control" id="subscription_plan" name="subscription_plan"
                                placeholder="Enter Subscription Plan">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Organization</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
