{{-- resources/views/admin/doctors/edit.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Doctor</h1>

        <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $doctor->name }}" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" class="form-control" value="{{ $doctor->age }}" required>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" class="form-control" value="{{ $doctor->city }}" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ $doctor->phone_number }}" required>
            </div>

            <button type="submit" class="btn btn-success">Update Doctor</button>
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-success">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
