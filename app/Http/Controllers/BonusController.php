<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = Bonus::with('employee')->get();
        return view('leave.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $employees = Employee::all();
        return view('leave.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type'  => 'required|in:Casual,Sick,Unpaid',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'status'      => 'required|in:Pending,Approved,Rejected',
        ]);

        Bonus::create([
            'employee_id' => $request->employee_id,
            'leave_type'  => $request->leave_type,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'status'      => $request->status,
        ]);

        return redirect()->route('leave.index')->with('success', 'Leave created successfully.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Bonus $bonus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bonus $bonus)
    {
        $employees = Employee::all();
        return view('leave.edit', compact('leave', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bonus $bonus)
    {
         $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type'  => 'required|in:Casual,Sick,Unpaid',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'status'      => 'required|in:Pending,Approved,Rejected',
        ]);

        $bonus->update([
            'employee_id' => $request->employee_id,
            'leave_type'  => $request->leave_type,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'status'      => $request->status,
        ]);

        return redirect()->route('leave.index')->with('success', 'Leave updated successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bonus $bonus)
    {
        $bonus->delete();
        return redirect()->route('leave.index')->with('success', 'Leave deleted successfully.');
    }
}
