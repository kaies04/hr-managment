<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $data = Attendance::with('employee')
            ->where('company_id', auth()->user()->company_id ?? null)
            ->get();
        return view('attendance.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:Present,Absent,Leave,Late,Half-day',
            'check_in' => 'nullable|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i|after_or_equal:check_in',
        ]);

        Attendance::create([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'status' => $request->status,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('attendance.index')->with('success', 'Attendance created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
           $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
         $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:Present,Absent,Leave,Late,Half-day',
            'check_in' => 'nullable|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i|after_or_equal:check_in',
        ]);

        $attendance->update([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'status' => $request->status,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully.');
    }
}
