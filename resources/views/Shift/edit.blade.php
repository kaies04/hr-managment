@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Shift</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('shift.update', $shift->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- Shift Name --}}
                    <div class="form-group">
                        <label for="name">Shift Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $shift->name }}" required>
                    </div>

                    {{-- Start Time --}}
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $shift->start_time }}" required>
                    </div>

                    {{-- End Time --}}
                    <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $shift->end_time }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Shift</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
