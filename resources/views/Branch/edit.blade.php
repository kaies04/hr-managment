@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Branch</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('branch.update', $branch->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Company Dropdown --}}
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select class="form-control" id="company_id" name="company_id" required>
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" 
                                    {{ $branch->company_id == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Branch Name --}}
                    <div class="form-group">
                        <label for="branch_name">Branch Name</label>
                        <input type="text" class="form-control" id="branch_name" name="branch_name"
                               value="{{ $branch->branch_name }}" required>
                    </div>

                    {{-- Contact Number --}}
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number"
                               value="{{ $branch->contact_number }}">
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email">Branch Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{ $branch->email }}">
                    </div>

                    {{-- Location --}}
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location"
                               value="{{ $branch->location }}">
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="active" {{ $branch->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $branch->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Branch</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
