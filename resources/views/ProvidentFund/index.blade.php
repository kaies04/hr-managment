@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Provident Funds</h2>
                <a class="btn btn-primary btn-sm" href="{{ route('providentfund.create') }}">Add Provident Fund</a>
            </div>
            <div class="card-body">
                <table id="providentFundTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Contribution Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $fund)
                        <tr>
                            <td>{{ $fund->id }}</td>
                            <td>{{ $fund->employee->name ?? 'N/A' }}</td>
                            <td>{{ $fund->month }}</td>
                            <td>{{ $fund->year }}</td>
                            <td>{{ $fund->contribution_amount }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                       id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('providentfund.edit', $fund->id) }}">Edit</a>
                                        <form action="{{ route('providentfund.destroy', $fund->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No Provident Funds Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
