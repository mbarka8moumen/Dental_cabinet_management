<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - RM Dentist Labs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">
    <script>
        function openForm() {
            document.getElementById("appointmentForm").classList.remove("hidden");
        }
        function closeForm() {
            document.getElementById("appointmentForm").classList.add("hidden");
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white p-5">
        <a href="{{ route('admin.dashboard') }}">
            <h1 class="text-2xl font-bold mb-5">RM Dentist Labs</h1>
        </a>
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
                </li>
                </li><li class="mb-3">
                        <a href="{{ route('home') }}" class="block p-2 rounded hover:bg-blue-700">home</a>
                    </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10 bg-white shadow-md rounded-lg mx-6 my-6 overflow-auto">
        <h2 class="text-3xl font-semibold mb-6">Appointments</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Button -->
        <button onclick="openForm()" class="bg-green-500 text-white px-4 py-2 rounded mb-4">Add Appointment</button>

        <!-- Modal Form -->
        <div id="appointmentForm" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white p-8 rounded-lg shadow-lg w-1/3">
                <h3 class="text-xl font-semibold mb-4">Add Appointment</h3>
                <form method="POST" action="{{ route('admin.appointments.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-semibold">First Name</label>
                        <input type="text" name="first_name" class="w-full p-2 border rounded mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold">Last Name</label>
                        <input type="text" name="last_name" class="w-full p-2 border rounded mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold">Doctor</label>
                        <select name="doctor_id" class="w-full p-2 border rounded mt-1" required>
                            <option value="">-- Select Doctor --</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold">Date</label>
                        <input type="date" name="appointment_date" class="w-full p-2 border rounded mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold">Time</label>
                        <input type="time" name="appointment_time" class="w-full p-2 border rounded mt-1" required>
                    </div>
                    <div class="flex justify-between">
                        <button type="button" onclick="closeForm()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full bg-gray-50 shadow-md rounded-lg border border-gray-200">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-4 text-left">Patient</th>
                        <th class="p-4 text-left">Doctor</th>
                        <th class="p-4 text-left">Date</th>
                        <th class="p-4 text-left">Time</th>
                        <th class="p-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr class="border-b border-gray-300">
                            <td class="p-4">{{ $appointment->first_name }} {{ $appointment->last_name }}</td>
                            <td class="p-4">{{ $appointment->doctor->name ?? 'N/A' }}</td>
                            <td class="p-4">{{ $appointment->appointment_date }}</td>
                            <td class="p-4">{{ $appointment->appointment_time }}</td>
                            <td class="p-4 flex gap-2">
                                <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                                <form method="POST" action="{{ route('admin.appointments.destroy', $appointment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-2 py-1 rounded" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4">No appointments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>
