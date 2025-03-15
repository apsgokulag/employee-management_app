@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                  class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="password" class="block text-gray-700 mb-2">Password</label>
            <input id="password" type="password" name="password" required
                  class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Login
            </button>
        </div>
        
        <div class="text-center">
            <p>Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a></p>
        </div>
    </form>
</div>
@endsection