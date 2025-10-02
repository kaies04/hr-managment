@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Designations</h2>
                <a class="btn btn-primary btn-sm" href="{{ route('designation.create') }}">Add Designation</a>
            </div>
            <div class="card-body">
                <table id="designationTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Department</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($designations as $designation)
                            <tr>
                                <td>{{ $designation->id }}</td>
                                <td>{{ $designation->company->company_name }}</td>
                                <td>{{ $designation->department->name }}</td>
                                <td>{{ $designation->title }}</td>
                                <td>
                                    <a href="{{ route('designation.edit', $designation->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('designation.destroy', $designation->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this designation?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Designations Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
