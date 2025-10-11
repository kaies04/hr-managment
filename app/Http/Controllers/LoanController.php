<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Loan::with('employee')->get();
        return view('loan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $employees = Employee::all();
        return view('loan.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id'         => 'required|exists:employees,id',
            'loan_amount'         => 'required|numeric|min:0',
            'monthly_installment' => 'required|numeric|min:0',
            'remaining_balance'   => 'required|numeric|min:0',
            'start_date'          => 'required|date',
            'status'              => 'required|in:Active,Cleared',
        ]);

        Loan::create([
            'employee_id'         => $request->employee_id,
            'loan_amount'         => $request->loan_amount,
            'monthly_installment' => $request->monthly_installment,
            'remaining_balance'   => $request->remaining_balance,
            'start_date'          => $request->start_date,
            'status'              => $request->status,
        ]);

        return redirect()->route('loan.index')->with('success', 'Loan created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        $employees = Employee::all();
        return view('loan.edit', compact('loan', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
         $request->validate([
            'employee_id'         => 'required|exists:employees,id',
            'loan_amount'         => 'required|numeric|min:0',
            'monthly_installment' => 'required|numeric|min:0',
            'remaining_balance'   => 'required|numeric|min:0',
            'start_date'          => 'required|date',
            'status'              => 'required|in:Active,Cleared',
        ]);

        $loan->update([
            'employee_id'         => $request->employee_id,
            'loan_amount'         => $request->loan_amount,
            'monthly_installment' => $request->monthly_installment,
            'remaining_balance'   => $request->remaining_balance,
            'start_date'          => $request->start_date,
            'status'              => $request->status,
        ]);

        return redirect()->route('loan.index')->with('success', 'Loan updated successfully.');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loan.index')->with('success', 'Loan deleted successfully.');
   
    }
}
