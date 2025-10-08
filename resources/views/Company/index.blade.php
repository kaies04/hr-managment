@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Companies</h2>
                <a href="{{ route('company.create') }}" class="btn btn-primary btn-sm">Add Company</a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>Organization</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->company_name }}</td>
                            <td>{{ $company->organization->org_name ?? 'N/A' }}</td>
                            <td>{{ $company->company_contact_number }}</td>
                            <td>{{ $company->company_email }}</td>
                            <td>{{ $company->company_address }}</td>
                            <td>{{ ucfirst($company->company_status) }}</td>
                            <td>
                                <a href="{{ route('company.edit', $company->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('company.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this company?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No Companies Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
