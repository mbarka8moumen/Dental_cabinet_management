<!-- resources/views/admin/doctors/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors - RM Dentist Labs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">
    <script>
        function openForm(action) {
            if (action === 'add') {
                document.getElementById("doctorForm").classList.remove("hidden");
            }
        }

        function closeForm() {
            document.getElementById("doctorForm").classList.add("hidden");
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white p-5">
            <a href="../index.html">
                <h1 class="text-2xl font-bold mb-5">RM Dentist Labs</h1>
            </a>
            <nav>
                <ul>
                    <li class="mb-3">
                        <a href="{{ route('admin.dashboard') }}" class="block p-2 rounded bg-blue-700">Dashboard</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.patients') }}" class="block p-2 rounded hover:bg-blue-700">Patients</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.appointments') }}" class="block p-2 rounded hover:bg-blue-700">Appointments</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.doctors') }}" class="block p-2 rounded hover:bg-blue-700">Doctors</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10 bg-white shadow-md rounded-lg mx-6 my-6">
            <h2 class="text-3xl font-semibold mb-6">Doctors</h2>

            <!-- Affichage du message de succès -->
            @if(session('success'))
                <script>
                    alert("{{ session('success') }}");
                </script>
            @endif

            <!-- Bouton pour ouvrir le formulaire d'ajout -->
            <button onclick="openForm('add')" class="bg-green-500 text-white px-4 py-2 rounded mb-4">Add Doctor</button>
            
            <!-- Formulaire Modal pour ajouter un médecin -->
            <div id="doctorForm" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-8 rounded-lg shadow-lg w-1/3">
                    <h3 class="text-xl font-semibold mb-4">Add Doctor</h3>
                    <form action="{{ route('admin.doctors.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-semibold">Name</label>
                            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                        </div>
                        <div class="mb-4">
                            <label for="age" class="block text-sm font-semibold">Age</label>
                            <input type="number" id="age" name="age" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                        </div>
                        <div class="mb-4">
                            <label for="city" class="block text-sm font-semibold">City</label>
                            <input type="text" id="city" name="city" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone_number" class="block text-sm font-semibold">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                        </div>
                        <div class="flex justify-between">
                            <button type="button" onclick="closeForm()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Doctor</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full bg-gray-50 shadow-md rounded-lg border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-4 text-left">Doctor's Name</th>
                            <th class="p-4 text-left">Age</th>
                            <th class="p-4 text-left">City</th>
                            <th class="p-4 text-left">Phone Number</th>
                            <th class="p-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($doctors as $doctor)
                            <tr class="border-b border-gray-300">
                                <td class="p-4">{{ $doctor->name }}</td>
                                <td class="p-4">{{ $doctor->age }}</td>
                                <td class="p-4">{{ $doctor->city }}</td>
                                <td class="p-4">{{ $doctor->phone_number }}</td>
                                <td class="p-4">
                                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                                    <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-4">No doctors found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
