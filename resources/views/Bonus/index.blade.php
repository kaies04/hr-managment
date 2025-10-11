@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Bonus List</h2>
                <a class="btn btn-primary btn-sm" href="{{ route('bonus.create') }}">Add Bonus</a>
            </div>
            <div class="card-body">
                <table id="bonusTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $bonus)
                        <tr>
                            <td>{{ $bonus->id }}</td>
                            <td>{{ $bonus->employee->name ?? 'N/A' }}</td>
                            <td>{{ $bonus->type }}</td>
                            <td>{{ $bonus->amount }}</td>
                            <td>{{ $bonus->date->format('d M Y') }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                       id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('bonus.edit', $bonus->id) }}">Edit</a>
                                        <form action="{{ route('bonus.destroy', $bonus->id) }}" method="POST" class="d-inline">
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
                            <td colspan="6" class="text-center">No Bonuses Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
