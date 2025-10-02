@extends('layouts.master')

@section('content')
    <!-- Table Organization -->
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Organizations</h2>
                    <a class="btn btn-primary btn-sm" href="{{ route('organization.create') }}">Add Organization</a>
                </div>
                <div class="card-body">
                    <table id="organizationTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Subscription Plan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $organization)
                                <tr>
                                    <td>{{ $organization->id }}</td>
                                    <td>{{ $organization->org_name }}</td>
                                    <td>{{ $organization->org_email }}</td>
                                    <td>{{ $organization->org_contact_number }}</td>
                                    <td>{{ $organization->subscription_plan }}</td>
                                    <td>{{ ucfirst($organization->status) }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('organization.edit', $organization->id) }}">Edit</a>
                                                <form action="{{ route('organization.destroy', $organization->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Delete this organization?')">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Organizations Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection











{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Organizations</h2>
    <a href="{{ route('organization.create') }}" class="btn btn-primary mb-3">Add Organization</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        
        <tbody>
        @foreach($data as $d)
        
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="text-primary" scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">email</th>
              <th scope="col">contact_number</th>
              <th scope="col">subscription_plan</th>
              <th scope="col">status</th>
            </tr>
          </thead>
          <tbody>
            
              <tr>
                <td>{{ $d->name }}</td>
                <td>{{ $d->email }}</td>
                <td>{{ $d->contact_number }}</td>
                <td>{{ $d->subscription_plan }}</td>
                <td>{{ ucfirst($d->status) }}</td>
                <td>
                    <a href="{{ route('organization.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('organization.destroy', $d->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this organization?')">Delete</button>
                    </form>
                </td>
            </tr>
              <td>
                <label class="switch switch-primary switch-pill form-control-label ">
                  <input type="checkbox" class="switch-input form-check-input" value="on" checked>
                  <span class="switch-label"></span>
                  <span class="switch-handle"></span>
                </label>
              </td>
            
           
          </tbody>
        </table>
      </div>
    </div>
            
        @endforeach
        </tbody>
    </table>
</div>
@endsection --}}