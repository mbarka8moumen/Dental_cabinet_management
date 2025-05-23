<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients - RM Dentist Labs</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">
</head>
<body class="bg-gray-100 font-sans">
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
    <a href="{{ route('admin.patients') }}" class="block p-2 rounded hover:bg-blue-700">Patients</a>
</li>
<li class="mb-3">
    <a href="{{ route('admin.appointments') }}" class="block p-2 rounded hover:bg-blue-700">Appointments</a>
</li>
<li class="mb-3">
    <a href="{{ route('admin.doctors.index') }}" class="block p-2 rounded hover:bg-blue-700">Doctors</a>
</li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-10 bg-white shadow-md rounded-lg mx-6 my-6">
            <h2 class="text-3xl font-semibold mb-6">Patients</h2>
            <button onclick="openForm('add')" class="bg-green-500 text-white px-4 py-2 rounded mb-4">Add Patient</button>
            <div class="overflow-x-auto">
                <table class="w-full bg-gray-50 shadow-md rounded-lg border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-4 text-left">Name</th>
                            <th class="p-4 text-left">Age</th>
                            <th class="p-4 text-left">City</th>
                            <th class="p-4 text-left">Address</th>
                            <th class="p-4 text-left">Phone</th>
                            <th class="p-4 text-left">Service</th>
                            <th class="p-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-300">
                            <td class="p-4">Moumen Mbarka</td>
                            <td class="p-4">24</td>
                            <td class="p-4">Guelmim</td>
                            <td class="p-4">123 Rue Example</td>
                            <td class="p-4">+212600000000</td>
                            <td class="p-4">Détartrage et nettoyage</td>
                            <td class="p-4">
                                <button onclick="openForm('edit')" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    
    <!-- Popup Form -->
    <div id="patientForm" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 id="formTitle" class="text-xl font-semibold mb-4">Add Patient</h3>
            <label class="block mb-2">Patient Name</label>
            <input type="text" class="w-full p-2 border rounded mb-4" placeholder="Enter patient name">
            
            <label class="block mb-2">Age</label>
            <input type="number" class="w-full p-2 border rounded mb-4" placeholder="Enter age">
            
            <label class="block mb-2">City</label>
            <input type="text" class="w-full p-2 border rounded mb-4" placeholder="Enter city">
            
            <label class="block mb-2">Address</label>
            <input type="text" class="w-full p-2 border rounded mb-4" placeholder="Enter address">
            
            <label class="block mb-2">Phone Number</label>
            <input type="tel" class="w-full p-2 border rounded mb-4" placeholder="Enter phone number">
            
            <label class="block mb-2">Select Service</label>
            <select class="w-full p-2 border rounded mb-4">
                <option value="Pose de prothèses dentaires">Pose de prothèses dentaires</option>
                <option value="Extraction des dents">Extraction des dents</option>
                <option value="Détartrage et nettoyage">Détartrage et nettoyage</option>
                <option value="Orthodontie : dents et correction faciale">Orthodontie : dents et correction faciale</option>
                <option value="Restauration des dents abîmées ou cassées">Restauration des dents abîmées ou cassées</option>
            </select>
            
            <div class="flex justify-end gap-2">
                <button onclick="closeForm()" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </div>
    </div>
    
    <script>
        function openForm(type) {
            document.getElementById('patientForm').classList.remove('hidden');
            document.getElementById('formTitle').innerText = type === 'add' ? 'Add Patient' : 'Edit Patient';
        }
        
        function closeForm() {
            document.getElementById('patientForm').classList.add('hidden');
        }
    </script>
</body>
</html>
