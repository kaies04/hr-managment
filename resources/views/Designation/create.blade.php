@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Designation</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('designation.store') }}" method="POST">
                    @csrf

                    {{-- Designation Title --}}
                    <div class="form-group">
                        <label for="title">Designation Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Designation Title" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Designation</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
