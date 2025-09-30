@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Add Department</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('department.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Department Name" required>

                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Department</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection