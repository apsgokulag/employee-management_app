@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
            <h2 class="text-xl font-semibold text-blue-700 mb-2">Total Employees</h2>
            <p class="text-3xl font-bold">{{ $totalEmployees }}</p>
        </div>
        
        <div class="bg-green-50 border border-green-200 rounded-lg p-6">
            <h2 class="text-xl font-semibold text-green-700 mb-2">Your Role</h2>
            <p class="text-3xl font-bold capitalize">{{ Auth::user()->role }}</p>
        </div>
        
        <div class="bg-purple-50 border border-purple-200 rounded-lg p-6">
            <h2 class="text-xl font-semibold text-purple-700 mb-2">Quick Access</h2>
            <div class="mt-4">
                <a href="{{ route('employees.index') }}" class="block bg-purple-600 text-white py-2 px-4 rounded text-center hover:bg-purple-700">
                    View Employees
                </a>
                
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('employees.create') }}" class="block mt-2 bg-purple-600 text-white py-2 px-4 rounded text-center hover:bg-purple-700">
                        Add New Employee
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection