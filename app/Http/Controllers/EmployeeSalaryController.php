<?php

namespace App\Http\Controllers;

use App\Models\Employee_Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Employee_Salary::where('employee_id', auth()->user()->employee_id)->get();
        return view('employee_salary.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee_salary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id'   => 'required|exists:employees,id',
            'basic_salary'  => 'required|numeric|min:0',
            'allowances'    => 'nullable|numeric|min:0',
            'pf_enabled'    => 'required|boolean',
            'pf_percentage' => 'nullable|numeric|min:0|max:100',
            'loan_active'   => 'required|boolean',
        ]);

        Employee_Salary::create($request->all());

        return redirect()->route('employee_salary.index')->with('success', 'Employee salary created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee_Salary $employee_Salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee_Salary $employee_Salary)
    {
        return view('employee_salary.edit', compact('employee_salary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee_Salary $employee_Salary)
    {
         $request->validate([
            'employee_id'   => 'required|exists:employees,id',
            'basic_salary'  => 'required|numeric|min:0',
            'allowances'    => 'nullable|numeric|min:0',
            'pf_enabled'    => 'required|boolean',
            'pf_percentage' => 'nullable|numeric|min:0|max:100',
            'loan_active'   => 'required|boolean',
        ]);

        $employeeSalary->update($request->all());

        return redirect()->route('employee_salary.index')->with('success', 'Employee salary updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee_Salary $employee_Salary)
    {
         
    }
}
