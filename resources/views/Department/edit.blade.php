







@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Department</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('department.update', $department->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Department Name" required value="{{ $department->name }}">

                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="active" {{ $department->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $department->status == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Department</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection