<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Contact Messages</h2>
        <table id="contactTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>File</th>
                    <th>Received At</th>
                </tr>
            </thead>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('contact.data') }}", // Uses the named route
    columns: [
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'subject', name: 'subject' },
        { data: 'message', name: 'message' },
        { data: 'file', name: 'file', orderable: false, searchable: false },
        { data: 'created_at', name: 'created_at' },
    ]
});

        });
    </script>
</body>

</html>
