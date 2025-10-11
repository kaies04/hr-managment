<?php

namespace App\Http\Controllers;

use App\Models\ProvidentFund;
use Illuminate\Http\Request;

class ProvidentFundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProvidentFund::with('employee')->get();
        return view('providentfund.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('providentfund.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id'         => 'required|exists:employees,id',
            'month'               => 'required|string|max:20',
            'year'                => 'required|digits:4|integer',
            'contribution_amount' => 'required|numeric|min:0',
        ]);

        ProvidentFund::create([
            'employee_id'         => $request->employee_id,
            'month'               => $request->month,
            'year'                => $request->year,
            'contribution_amount' => $request->contribution_amount,
        ]);

        return redirect()->route('providentfund.index')->with('success', 'Provident Fund created successfully.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(ProvidentFund $providentFund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProvidentFund $providentFund)
    {
        $employees = Employee::all();
        return view('providentfund.edit', compact('providentfund', 'employees'));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProvidentFund $providentFund)
    {
         $request->validate([
            'employee_id'         => 'required|exists:employees,id',
            'month'               => 'required|string|max:20',
            'year'                => 'required|digits:4|integer',
            'contribution_amount' => 'required|numeric|min:0',
        ]);

        $providentfund->update([
            'employee_id'         => $request->employee_id,
            'month'               => $request->month,
            'year'                => $request->year,
            'contribution_amount' => $request->contribution_amount,
        ]);

        return redirect()->route('providentfund.index')->with('success', 'Provident Fund updated successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProvidentFund $providentFund)
    {
        $providentfund->delete();
        return redirect()->route('providentfund.index')->with('success', 'Provident Fund deleted successfully.');
   
    }
}
