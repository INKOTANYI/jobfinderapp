<!-- resources/views/engineers/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Engineers</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">All Engineers</h2>

        @if ($engineers->isEmpty())
            <div class="alert alert-warning">No engineers found.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Degree</th>
                        <th>CV</th>
                        <th>NIDA/Passport</th>
                        <th>District</th>
                        <th>Sector</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($engineers as $engineer)
                        <tr>
                            <td>{{ $engineer->fname }}</td>
                            <td>{{ $engineer->lname }}</td>
                            <td>{{ $engineer->email }}</td>
                            <td>{{ $engineer->phone }}</td>
                            <td>{{ $engineer->departement->name ?? 'N/A' }}</td>
                            <td>
                                @if ($engineer->cv_path)
                                    <a href="{{ Storage::url($engineer->cv_path) }}" class="btn btn-primary btn-sm"
                                        target="_blank">Download CV</a>
                                @else
                                    <span class="text-muted">No CV uploaded</span>
                                @endif
                            </td>
                            <td>
                                @if ($engineer->degree_path)
                                    <a href="{{ Storage::url($engineer->degree_path) }}"
                                        class="btn btn-secondary btn-sm" target="_blank">Download Degree</a>
                                @else
                                    <span class="text-muted">No Degree uploaded</span>
                                @endif
                            </td>
                            <td>
                                @if ($engineer->nida_path)
                                    <a href="{{ Storage::url($engineer->nida_path) }}" class="btn btn-secondary btn-sm"
                                        target="_blank">Download NIDA/Passport</a>
                                @else
                                    <span class="text-muted">No Passport uploaded</span>
                                @endif
                            </td>
                            <td>{{ $engineer->district->name ?? 'N/A' }}</td>
                            <td>{{ $engineer->sector->name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
