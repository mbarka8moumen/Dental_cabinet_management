<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List - RM Dentist Labs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">
</head>
<body class="bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-56 bg-blue-900 text-white p-4">
        <a href="{{ route('admin.dashboard') }}">
            <h1 class="text-xl font-semibold mb-4">RM Dentist Labs</h1>
        </a>
        <nav>
            <ul>
                <li class="mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="block p-2 rounded hover:bg-blue-700 text-sm">Dashboard</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.patients.index') }}" class="block p-2 rounded bg-blue-700 text-sm">Patients</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.appointments') }}" class="block p-2 rounded hover:bg-blue-700 text-sm">Appointments</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.doctors.index') }}" class="block p-2 rounded hover:bg-blue-700 text-sm">Doctors</a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-white shadow-md rounded-lg mx-4 my-4 overflow-auto">
        <h2 class="text-2xl font-semibold mb-4">Patients List</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Button -->
        <a href="{{ route('admin.patients.create') }}" class="bg-green-500 text-white px-3 py-1 rounded mb-4 inline-block text-sm">Add Patient</a>

        <!-- Table -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full bg-gray-50 shadow-md rounded-lg border border-gray-200 text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Age</th>
                        <th class="p-3 text-left">City</th>
                        <th class="p-3 text-left">Address</th>
                        <th class="p-3 text-left">Phone</th>
                        <th class="p-3 text-left">Service</th>
                        <th class="p-3 text-left">Created At</th>
                        <th class="p-3 text-left">Updated At</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                        <tr class="border-b border-gray-300">
                            <td class="p-3">{{ $patient->name }}</td>
                            <td class="p-3">{{ $patient->age }}</td>
                            <td class="p-3">{{ $patient->city }}</td>
                            <td class="p-3">{{ $patient->address }}</td>
                            <td class="p-3">{{ $patient->phone }}</td>
                            <td class="p-3">{{ $patient->service }}</td>
                            <td class="p-3">{{ $patient->created_at }}</td>
                            <td class="p-3">{{ $patient->updated_at }}</td>
                            <td class="p-3 flex gap-2">
                                <a href="{{ route('admin.patients.edit', $patient->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Edit</a>
                                <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($patients->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center p-4 text-sm">No patients found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>
