<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
         $employees = Employee::get();
        return view('payroll.create', compact('employees'));
    }

    public function get_employee_absent(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        if ($employee) {
            $absentCount = $employee->attendances()
                ->where('date', '>=', "{$request->year}-{$request->month}-01")
                ->where('date', '<=', "{$request->year}-{$request->month}-31")
                ->where('status', '1')
                ->count();
            return response()->json(['absent_days' => $absentCount]);
        }
        return response()->json(['absent_days' => 0]);
    }

    public function monthly_loan_deduction(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        if ($employee) {
            $loan=$employee->loans()
            ->where('start_date','<=',"{$request->year}-{$request->month}-01")
            ->where('finish_date','>=',"{$request->year}-{$request->month}-31")
            ->where('status','Active')->first();
           
            if($loan){
                // Ensure we don't deduct more than the remaining balance
                $deduction = min($loan->monthly_installment, $loan->remaining_balance);
                return response()->json(['loan_deduction' => $deduction]);
            }
            return response()->json(['loan_deduction' => 0]);
        }
        return response()->json(['loan_deduction' => 0]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer',
        ]);

        $employees = Employee::all();
        
        foreach ($employees as $employee) {
            Payroll::create([
                'employee_id' => $employee->id,
                'month' => $request->month,
                'year' => $request->year,
                'basic_salary' => $request->input("basic_salary_{$employee->id}"),
                'total_absent' => $request->input("total_absent_{$employee->id}"),
                'deduction_for_absent' => $request->input("deduction_for_absent_{$employee->id}"),
                'loan_deduction' => $request->input("loan_deduction_{$employee->id}"),
                'allowances' => $request->input("allowances_{$employee->id}"),
                'deductions' => $request->input("deductions_{$employee->id}"),
                'bonuses' => $request->input("bonuses_{$employee->id}"),
                'net_salary' => $request->input("net_salary_{$employee->id}"),
                'payment_status' => $request->input("payment_status_{$employee->id}"),
                'status' => $request->input("status_{$employee->id}"),
                'remarks' => $request->input("remarks_{$employee->id}"),
            ]);
        }

        return redirect()->route('payroll.index')->with('success', 'Payroll created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payroll $payroll)
    {
        return view('payroll.show', compact('payroll'));
        
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
