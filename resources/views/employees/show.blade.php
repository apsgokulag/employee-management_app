@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Employee Details</h1>
        
        <div>
            <a href="{{ route('employees.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">
                Back to List
            </a>
            
            @if(Auth::user()->isAdmin())
                <a href="{{ route('employees.edit', $employee) }}" class="ml-2 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Edit
                </a>
            @endif
        </div>
    </div>
    
    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-gray-600 text-sm">Employee ID</h2>
                <p class="text-lg font-semibold">{{ $employee->employee_id }}</p>
            </div>
            
            <div>
                <h2 class="text-gray-600 text-sm">Name</h2>
                <p class="text-lg font-semibold">{{ $employee->name }}</p>
            </div>
            
            <div>
                <h2 class="text-gray-600 text-sm">Email</h2>
                <p class="text-lg font-semibold">{{ $employee->email }}</p>
            </div>
            
            <div>
                <h2 class="text-gray-600 text-sm">Date of Birth</h2>
                <p class="text-lg font-semibold">{{ $employee->dob->format('M d, Y') }}</p>
            </div>
            
            <div>
                <h2 class="text-gray-600 text-sm">Date of Joining</h2>
                <p class="text-lg font-semibold">{{ $employee->doj->format('M d, Y') }}</p>
            </div>
            
            <div>
                <h2 class="text-gray-600 text-sm">Created At</h2>
                <p class="text-lg font-semibold">{{ $employee->created_at->format('M d, Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection