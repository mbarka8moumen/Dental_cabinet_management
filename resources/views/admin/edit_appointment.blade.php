<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment - RM Dentist Labs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-xl font-semibold mb-4">Edit Appointment</h3>
            <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <label class="block mb-2">First Name</label>
                <input type="text" name="first_name" value="{{ $appointment->first_name }}" class="w-full p-2 border rounded mb-4" required>
                
                <label class="block mb-2">Last Name</label>
                <input type="text" name="last_name" value="{{ $appointment->last_name }}" class="w-full p-2 border rounded mb-4" required>
                
                <label class="block mb-2">Doctor</label>
                <input type="text" name="doctor_name" value="{{ $appointment->doctor_name }}" class="w-full p-2 border rounded mb-4" required>
                
                <label class="block mb-2">Date</label>
                <input type="date" name="appointment_date" value="{{ $appointment->appointment_date }}" class="w-full p-2 border rounded mb-4" required>
                
                <label class="block mb-2">Time</label>
                <input type="time" name="appointment_time" value="{{ $appointment->appointment_time }}" class="w-full p-2 border rounded mb-4" required>
                
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Appointment</button>
                <br><br>
                <a href="{{ url('/admin/dashboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
