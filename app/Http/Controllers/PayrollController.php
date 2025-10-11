<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Payroll::with('employee')->get();
        return view('payroll.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $employees = Employee::all();
        return view('payroll.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id'   => 'required|exists:employees,id',
            'month'         => 'required|string|max:20',
            'year'          => 'required|digits:4|integer',
            'basic_salary'  => 'required|numeric|min:0',
            'allowances'    => 'required|numeric|min:0',
            'deductions'    => 'required|numeric|min:0',
            'bonuses'       => 'required|numeric|min:0',
            'net_salary'    => 'required|numeric|min:0',
            'generated_at'  => 'nullable|date',
        ]);

        Payroll::create([
            'employee_id'  => $request->employee_id,
            'month'        => $request->month,
            'year'         => $request->year,
            'basic_salary' => $request->basic_salary,
            'allowances'   => $request->allowances,
            'deductions'   => $request->deductions,
            'bonuses'      => $request->bonuses,
            'net_salary'   => $request->net_salary,
            'generated_at' => $request->generated_at,
        ]);

        return redirect()->route('payroll.index')->with('success', 'Payroll created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payroll $payroll)
    {
         $employees = Employee::all();
        return view('payroll.edit', compact('payroll', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payroll $payroll)
    {
         $request->validate([
            'employee_id'   => 'required|exists:employees,id',
            'month'         => 'required|string|max:20',
            'year'          => 'required|digits:4|integer',
            'basic_salary'  => 'required|numeric|min:0',
            'allowances'    => 'required|numeric|min:0',
            'deductions'    => 'required|numeric|min:0',
            'bonuses'       => 'required|numeric|min:0',
            'net_salary'    => 'required|numeric|min:0',
            'generated_at'  => 'nullable|date',
        ]);

        $payroll->update([
            'employee_id'  => $request->employee_id,
            'month'        => $request->month,
            'year'         => $request->year,
            'basic_salary' => $request->basic_salary,
            'allowances'   => $request->allowances,
            'deductions'   => $request->deductions,
            'bonuses'      => $request->bonuses,
            'net_salary'   => $request->net_salary,
            'generated_at' => $request->generated_at,
        ]);

        return redirect()->route('payroll.index')->with('success', 'Payroll updated successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
         $payroll->delete();
        return redirect()->route('payroll.index')->with('success', 'Payroll deleted successfully.');
   
    }
}
