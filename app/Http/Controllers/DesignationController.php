<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Designation::where('company_id', auth()->user()->company_id)
                ->where('department_id', auth()->user()->department_id)
                ->get();
        return view('designation.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('designation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'company_id'    => 'required|exists:companies,id',
            'title'         => 'required|string|max:255',
        ]);

        Designation::create([
            'department_id' => $request->department_id,
            'company_id'    => $request->company_id,
            'title'         => $request->title,
        ]);

        return redirect()->route('designation.index')->with('success', 'Designation created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        return view('designation.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'company_id'    => 'required|exists:companies,id',
            'title'         => 'required|string|max:255',
        ]);

        $designation->update([
            'department_id' => $request->department_id,
            'company_id'    => $request->company_id,
            'title'         => $request->title,
        ]);

        return redirect()->route('designation.index')->with('success', 'Designation updated successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        //
    }
}
