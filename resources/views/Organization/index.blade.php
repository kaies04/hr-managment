{{-- @extends('layouts.app')

@section('content') --}}
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
{{-- @endsection --}}