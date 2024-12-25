<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Engineers</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>All Engineers</h2>
        <table id="engineersTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>CV</th>
                    <th>Degree</th>
                    <th>District</th>
                    <th>Sector</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- DataTables Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#engineersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('engineers.data') }}", // Route for server-side data
                columns: [{
                        data: 'fname',
                        name: 'fname'
                    },
                    {
                        data: 'lname',
                        name: 'lname'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'department.name',
                        name: 'department.name',
                        defaultContent: 'N/A'
                    },
                    {
                        data: 'cv_path',
                        name: 'cv_path',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return data ? `<a href="${data}" target="_blank">Download CV</a>` :
                                'N/A';
                        }
                    },
                    {
                        data: 'degree_path',
                        name: 'degree_path',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return data ? `<a href="${data}" target="_blank">Download Degree</a>` :
                                'N/A';
                        }
                    },
                    {
                        data: 'district.name',
                        name: 'district.name',
                        defaultContent: 'N/A'
                    },
                    {
                        data: 'sector.name',
                        name: 'sector.name',
                        defaultContent: 'N/A'
                    }
                ]
            });
        });
    </script>
</body>

</html>
