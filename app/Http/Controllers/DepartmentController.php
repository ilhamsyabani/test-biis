<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::paginate(5);
        return view('pages.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'location' => 'nullable|string',
        ]);

        Department::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        return redirect()->route('departments.index')->with('success', 'Data Departemen berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'location' => 'nullable|string',
        ]);

 
        $department->update([
            'department_name' => $request->department_name,
            'location' => $request->location,
        ]);

        return redirect()->route('departments.index')->with('success', 'Data Departemen berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Data Departemen berhasil dihapus!');
    }
}
