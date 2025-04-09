<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors - RM Dentist Labs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white p-5">
        <a href="{{ route('admin.dashboard') }}">
            <h1 class="text-2xl font-bold mb-6">RM Dentist Labs</h1>
        </a>
        <nav>
            <ul>
                <li class="mb-3">
                    <a href="{{ route('admin.dashboard') }}" class="block p-2 rounded hover:bg-blue-700">Dashboard</a>
                </li>
                <li class="mb-3">
                    <a href="{{ route('admin.patients.index') }}" class="block p-2 rounded hover:bg-blue-700">Patients</a>
                </li>
                <li class="mb-3">
                    <a href="{{ route('admin.appointments') }}" class="block p-2 rounded hover:bg-blue-700">Appointments</a>
                </li>
                <li class="mb-3">
                    <a href="{{ route('admin.doctors.index') }}" class="block p-2 rounded bg-blue-700">Doctors</a>
                </li>
                </li><li class="mb-3">
                        <a href="{{ route('home') }}" class="block p-2 rounded hover:bg-blue-700">home</a>
                    </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10 bg-white shadow-md rounded-lg mx-6 my-6 overflow-auto">
        <h2 class="text-3xl font-semibold mb-6">Doctors List</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Bouton Ajouter -->
        <a href="{{ route('admin.doctors.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Doctor</a>

        <!-- Tableau -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full bg-gray-50 shadow-md rounded-lg border border-gray-200">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-4 text-left">Name</th>
                        <th class="p-4 text-left">Age</th>
                        <th class="p-4 text-left">City</th>
                        <th class="p-4 text-left">Phone Number</th>
                        <th class="p-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doctor)
                        <tr class="border-b border-gray-300">
                            <td class="p-4">{{ $doctor->name }}</td>
                            <td class="p-4">{{ $doctor->age }}</td>
                            <td class="p-4">{{ $doctor->city }}</td>
                            <td class="p-4">{{ $doctor->phone_number }}</td>
                            <td class="p-4 flex gap-2">
                                <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                                <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($doctors->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center p-4">No doctors found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>
