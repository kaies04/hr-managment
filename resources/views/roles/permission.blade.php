@extends('backend.layouts.app')
@section('pageTitle', 'Add Permissions to Role')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Permissions to Role</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.assignPermission', $role_id) }}">
                            @csrf

                            <div class="mb-3">
                                <label for="permissions" class="form-label">Permissions</label>
                                <ul class="list-unstyled">
                                    @foreach($permissions as $permission)
                                        <li><input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ (collect(old('permissions'))->contains($permission->name)) ? 'selected' : '' }}> {{ $permission->name }}</li>
                                    @endforeach
                                </ul>

                                @error('permissions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Assign Permissions</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
