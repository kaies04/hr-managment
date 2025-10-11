@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Attendances of - {{ \Carbon\Carbon::parse($attendance->date)->format('d M, Y') }}</h2>
                <a class="btn btn-primary btn-sm" href="{{ route('attendance.index') }}">Back to Attendance</a>
            </div>
            <div class="card-body">
                <table id="attendanceTable" class="table" style="width:100%">
                    @php $statusMap = ['0' => 'Present', '1' => 'Absent', '2' => 'Leave', '3' => 'Late', '4' => 'Half-day']; @endphp

                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>In Time</th>
                            <th>Out Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $att)
                        <tr>
                            <td>{{ $att->employee->name }}</td>
                            <td>{{ $att->check_in ? \Carbon\Carbon::parse($att->check_in)->format('h:i a') : '-' }}</td>
                            <td>{{ $att->check_out ? \Carbon\Carbon::parse($att->check_out)->format('h:i a') : '-' }}</td>
                            <td>{{ $statusMap[$att->status] }}</td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No Attendances Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
