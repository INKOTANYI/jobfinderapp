@extends('adminlte::page')

@section('title', 'Registered Engineers')

{{-- @section('content_header')
    <h1>Registered Engineers</h1>
@stop --}}

@section('content')
    <div class="container mt-3">
        <h2>All Engineers</h2>
        <table id="engineersTable" class="display table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
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
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <style>
        @media print {
            a {
                display: none !important;
            }
        }
    </style>



@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#engineersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('engineers.data') }}", // Route for server-side data
                columns: [{
                        data: null,
                        name: 'no',
                        render: function(data, type, row, meta) {
                            return meta.row + 1; // Serial number
                        },
                        searchable: false,
                        orderable: false
                    },
                    {
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
                        render: function(data, type, row, meta) {
                            if (type === 'print') {
                                return 'N/A'; // Replace with 'N/A' for print
                            }
                            return data ? `<a href="${data}" target="_blank">Download CV</a>` :
                                'N/A';
                        }
                    },
                    {
                        data: 'degree_path',
                        name: 'degree_path',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            if (type === 'print') {
                                return 'N/A'; // Replace with 'N/A' for print
                            }
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
                ],
                dom: 'Bfrtip', // Add the Buttons extension
                buttons: [{
                    extend: 'print',
                    text: 'Print Table', // Customize the button text
                    className: 'btn btn-primary', // Optional: style the button
                    customize: function(win) {
                        // Remove all hyperlinks (download buttons) during print
                        $(win.document.body).find('a').each(function() {
                            $(this).replaceWith('N/A');
                        });
                    }
                }]
            });
        });
    </script>
@stop
