@extends('layouts.master')

@section('content')
    <!-- Table Branch -->
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Branches</h2>
                    <a class="btn btn-primary btn-sm" href="{{ route('branch.create') }}">Add Branch</a>
                </div>
                <div class="card-body">
                    <table id="branchesTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company</th>
                                <th>Branch Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($branches as $branch)
                                <tr>
                                    <td>{{ $branch->id }}</td>
                                    <td>{{ $branch->company->name ?? 'N/A' }}</td>
                                    <td>{{ $branch->branch_name }}</td>
                                    <td>{{ $branch->contact_number }}</td>
                                    <td>{{ $branch->email }}</td>
                                    <td>{{ $branch->location }}</td>
                                    <td>{{ ucfirst($branch->status) }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('branch.edit', $branch->id) }}">Edit</a>
                                                <form action="{{ route('branch.destroy', $branch->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Branches Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
