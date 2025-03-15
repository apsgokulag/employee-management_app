<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .main-content {
            transition: margin-left 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        @auth
            <nav class="bg-blue-600 text-white p-4">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="flex items-center">
                        <button id="sidebarToggle" class="mr-4 md:hidden">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <a href="{{ route('dashboard') }}" class="text-xl font-bold">Employee Management</a>
                    </div>
                    <div class="flex items-center">
                        <span class="mr-4">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-blue-700 hover:bg-blue-800 rounded px-4 py-2">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>

            <div class="flex flex-1">
                <!-- Sidebar -->
                <aside id="sidebar" class="sidebar w-64 bg-gray-800 text-white p-4 md:block hidden">
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Navigation</h2>
                        <ul>
                            <li class="mb-2">
                                <a href="{{ route('dashboard') }}" class="block p-2 hover:bg-gray-700 rounded {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('employees.index') }}" class="block p-2 hover:bg-gray-700 rounded {{ request()->routeIs('employees.*') ? 'bg-gray-700' : '' }}">
                                    Employees
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('auth.profile') }}" class="block p-2 hover:bg-gray-700 rounded {{ request()->routeIs('auth.*') ? 'bg-gray-700' : '' }}">
                                    Profile
                                </a>
                            </li>
                            @if(Auth::user()->isAdmin())
                                <li class="mb-2">
                                    <a href="{{ route('employees.create') }}" class="block p-2 hover:bg-gray-700 rounded {{ request()->routeIs('employees.create') ? 'bg-gray-700' : '' }}">
                                        Add Employee
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </aside>

                <main id="mainContent" class="main-content flex-1 p-4 md:ml-0">
                    <div class="container mx-auto">
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                {{ session('error') }}
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </main>
            </div>
        @else
            <main class="flex-1">
                <div class="container mx-auto py-8">
                    @yield('content')
                </div>
            </main>
        @endauth
    </div>

    <script>
        // Sidebar toggle for mobile
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('hidden');
                    if (!sidebar.classList.contains('hidden')) {
                        sidebar.classList.add('absolute', 'z-50', 'h-full');
                        mainContent.classList.add('ml-0');
                    } else {
                        sidebar.classList.remove('absolute', 'z-50', 'h-full');
                        mainContent.classList.remove('ml-0');
                    }
                });
            }
        });
    </script>
</body>
</html>