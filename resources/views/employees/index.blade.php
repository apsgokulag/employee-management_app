@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Employees</h1>
        
        @if(Auth::user()->isAdmin())
            <a href="{{ route('employees.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Add Employee
            </a>
        @endif
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-3 px-4 bg-gray-100 border-b text-left">Employee ID</th>
                    <th class="py-3 px-4 bg-gray-100 border-b text-left">Name</th>
                    <th class="py-3 px-4 bg-gray-100 border-b text-left">Email</th>
                    <th class="py-3 px-4 bg-gray-100 border-b text-left">Date of Birth</th>
                    <th class="py-3 px-4 bg-gray-100 border-b text-left">Date of Joining</th>
                    <th class="py-3 px-4 bg-gray-100 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">{{ $employee->employee_id }}</td>
                        <td class="py-3 px-4 border-b">{{ $employee->name }}</td>
                        <td class="py-3 px-4 border-b">{{ $employee->email }}</td>
                        <td class="py-3 px-4 border-b">{{ $employee->dob->format('M d, Y') }}</td>
                        <td class="py-3 px-4 border-b">{{ $employee->doj->format('M d, Y') }}</td>
                        <td class="py-3 px-4 border-b text-center">
                            <a href="{{ route('employees.show', $employee) }}" class="text-blue-600 hover:underline mr-2">
                                View
                            </a>
                            
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('employees.edit', $employee) }}" class="text-green-600 hover:underline mr-2">
                                    Edit
                                </a>
                                
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this employee?')">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-3 px-4 text-center">No employees found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $employees->links() }}
    </div>
</div>
@endsection