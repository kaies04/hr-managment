{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
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
</div>
{{-- @endsection --}}
