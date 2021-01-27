$("#hospital").on('change', function () {
    let value = $(this).val();

    if (value == "VCEH") {
        $("#hospital-initial").val('VCEH-');
    } else if(value == "DNHS") {
        $("#hospital-initial").val('DNHS-');
    }
});    