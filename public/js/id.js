$("#hospital").change(function () {
    let value = $(this).val();

    if (value == "CHO") {
        $("#hospital-initial").val('CHO-');
    } else if(value == "SRCH") {
        $("#hospital-initial").val('SRCH-');
    } else if(value == "TMCSL") {
        $("#hospital-initial").val('TMCSL-');
    }
});    