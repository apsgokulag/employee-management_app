@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Employee</h1>
        
        <a href="{{ route('employees.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">
            Back to List
        </a>
    </div>
    
    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="mb-4">
                <label for="employee_id" class="block text-gray-700 mb-2">Employee ID</label>
                <input id="employee_id" type="text" name="employee_id" value="{{ old('employee_id', $employee->employee_id) }}" required
                      class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
                @error('employee_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="name" class="block text-gray-700 mb-2">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name', $employee->name) }}" required
                      class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $employee->email) }}" required
                      class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="dob" class="block text-gray-700 mb-2">Date of Birth</label>
                <input id="dob" type="date" name="dob" value="{{ old('dob', $employee->dob->format('Y-m-d')) }}" required
                      class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
                @error('dob')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="doj" class="block text-gray-700 mb-2">Date of Joining</label>
                <input id="doj" type="date" name="doj" value="{{ old('doj', $employee->doj->format('Y-m-d')) }}" required
                      class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
                @error('doj')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Update Employee
            </button>
        </div>
    </form>
</div>
@endsection