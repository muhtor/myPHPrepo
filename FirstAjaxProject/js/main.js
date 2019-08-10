$(document).ready(function () {
    $('#country').change(function () {
        let countryID = $(this).val();
        if (countryID !== 0) {
            // $("#divLoading").addClass('show');
            jQuery('#state').html('<option value="0">Select State</option>');
            jQuery('#city').html('<option value="0">Select City</option>');
            $.ajax({
                type: "POST",
                url: 'result.php',
                data: 'country_ID=' + countryID + '&type=state',
                success: function (state) {
                    // $("#divLoading").removeClass('show');
                    $('#state').append(state);
                }
            });
        }
    });
    $('#state').change(function () {
        let cityID = $(this).val();
        console.log(cityID);
        if (cityID !== 0) {
            // $("#divLoading").addClass('show');
            $('#city').html('<option value="0">Select City</option>');
            jQuery.ajax({
                type: "POST",
                url: 'result.php',
                data: 'city_ID=' + cityID + '&type=city',
                success: function (city) {
                    // $("#divLoading").removeClass('show');
                    $('#city').append(city);
                }
            });
        }
    });
});
