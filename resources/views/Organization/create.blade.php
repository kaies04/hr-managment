{{-- @extends('layouts.app')

@section('content') --}}





<div class="container">
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
</div>
{{-- @endsection --}}
