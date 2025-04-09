<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - RM Dentist Labs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white p-5">
            <a href="../index.html">
                <h1 class="text-2xl font-bold mb-5">RM Dentist Labs</h1></a>
            <nav>
                <ul>
                    <li class="mb-3">
                        <a href="{{ route('admin.dashboard') }}" class="block p-2 rounded bg-blue-700">Dashboard</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.patients.index') }}" class="block p-2 rounded hover:bg-blue-700">Patients</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.appointments') }}" class="block p-2 rounded hover:bg-blue-700">Appointments</a>
                    </li>
                    
                    <li class="mb-3">
                        <a href="{{ route('admin.doctors.index') }}" class="block p-2 rounded hover:bg-blue-700">Doctors</a>
                    </li><li class="mb-3">
                        <a href="{{ route('home') }}" class="block p-2 rounded hover:bg-blue-700">home</a>
                    </li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h2 class="text-3xl font-semibold mb-6">Dashboard</h2>
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Total Patients</h3>
                    <p class="text-2xl font-bold mt-2">{{ $totalPatients ?? 'No data available' }}</p>
                    </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Appointments Today</h3>
                    <p class="text-2xl font-bold mt-2">{{ $appointmentsToday ?? 'No data available' }}</p>
                    </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Available Doctors</h3>
                    <p class="text-2xl font-bold mt-2">{{ $availableDoctors ?? 'No data available' }}</p>
                    </div>
            </div>

            
        </main>
    </div>
</body>
</html>
