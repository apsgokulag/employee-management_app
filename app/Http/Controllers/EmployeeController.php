<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10); 

        return view('employees.index', compact('employees')); 
    }

    public function create()
    {
        return view('employees.create'); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|string|unique:employees',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'dob' => 'required|date',
            'doj' => 'required|date',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $user = Auth::user();
        return view('employees.edit', compact('employee', 'user'));
    }

   
    public function update(Request $request, Employee $employee)
    {
        $user = Auth::user();
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'dob' => 'required|date',
            'doj' => 'required|date',
        ]);
        $employee->update($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }
    public function destroy(Employee $employee)
    {
        $employee->delete(); 
        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
