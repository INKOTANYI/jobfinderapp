<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdown List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF token for AJAX -->

    <!-- Add any CSS or Bootstrap here -->
</head>

<body>
    <div class="container">
        <h1>Select Country and City</h1>

        <!-- Country Dropdown -->
        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="">Select Country</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>

        <!-- City Dropdown (Will be populated based on country selection) -->
        <label for="city">City:</label>
        <select id="city" name="city">
            <option value="">Select City</option>
        </select>
    </div>

    <!-- jQuery and AJAX script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var countryId = $(this).val();

                // Clear city dropdown if no country is selected
                if (!countryId) {
                    $('#city').html('<option value="">Select City</option>');
                    return;
                }

                // Perform AJAX request to get cities for the selected country
                $.ajax({
                    url: '/get-cities/' + countryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(cities) {
                        $('#city').empty(); // Clear the city dropdown
                        $('#city').append(
                            '<option value="">Select City</option>'); // Add default option

                        // Populate the city dropdown with cities
                        $.each(cities, function(key, city) {
                            $('#city').append('<option value="' + city.id + '">' + city
                                .name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
