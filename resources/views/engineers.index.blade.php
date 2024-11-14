<!-- resources/views/engineers/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineers List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Filter Engineers by Department</h2>

        <!-- Filter form -->
        <form action="{{ route('engineers.index') }}" method="GET" class="mb-4">
            <div class="form-group">
                <label for="department_id">Select Department:</label>
                <select name="department_id" id="department_id" class="form-control" onchange="this.form.submit()">
                    <option value="">All Departments</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $department_id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <!-- Engineers Table -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($engineers as $engineer)
                    <tr>
                        <td>{{ $engineer->fname }}</td>
                        <td>{{ $engineer->lname }}</td>
                        <td>{{ $engineer->email }}</td>
                        <td>{{ $engineer->phone }}</td>
                        <td>{{ $engineer->department->name ?? 'No Department' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
