let options = "";

$("#save-record-btn").click( function(){
    if ($("#line_no").val() === '' || $("#line_no").val().length < 2) {
        toastr.error('Found an error! Check row number 1 Line number is required & must be 2 characters.');
    } else {
        $('#save-record').modal('show');
    }
});

$("#line_no").change(function() {
    let value = $(this).val();

    if (value.length === 0) {
        toastr.error("Line number is required");
    } else if (value.length < 2) {
        toastr.error("Line number must be 2 characters long");
    }
});

$(".line-number").change(function() {
    let value = $(this).val();

    if (value.length === 0) {
        toastr.error("Line number is required");
    } else if (value.length < 2) {
        toastr.error("Line number must be 2 characters long");
    }
});

$("#fw_cmc").change(function() {
    if ($("#fw_rcc").val() == 1 || $("#fw_rcc").val() == 2 || $("#fw_rcc").val() == 5) {
        if ($("#fw_cmc").val() != 6) {
            $("#fw_cmc").attr("style", "background-color:#ff5c5c; color:#ffffff;");
        } else {
            $("#fw_cmc").removeAttr("style");
        }
    } else if ($("#fw_rcc").val() == 3 || $("#fw_rcc").val() == 6) {
        if (
            $("#fw_cmc").val() == 1 ||
            $("#fw_cmc").val() == 2 ||
            $("#fw_cmc").val() == 3 ||
            $("#fw_cmc").val() == 4
        ) {
            $("#fw_cmc").removeAttr("style");
        } else {
            $("#fw_cmc").attr("style", "background-color:#ff5c5c; color:#ffffff;");
        }
    } else if ($("#fw_rcc").val() == 4) {
        if (
            $("#fw_cmc").val() == 1 ||
            $("#fw_cmc").val() == 2 ||
            $("#fw_cmc").val() == 3 ||
            $("#fw_cmc").val() == 4 ||
            $("#fw_cmc").val() == 5
        ) {
            $("#fw_cmc").removeAttr("style");
        } else {
            $("#fw_cmc").attr("style", "background-color:#ff5c5c; color:#ffffff;");
        }
    }
});


$("#pw_cmc").change(function() {
    if ($("#pw_rcc").val() == 1 || $("#pw_rcc").val() == 2 || $("#pw_rcc").val() == 5) {
        if ($("#pw_cmc").val() != 6) {
            $("#pw_cmc").attr("style", "background-color:#ff5c5c; color:#ffffff;");
        } else {
            $("#pw_cmc").removeAttr("style");
        }
    } else if ($("#pw_rcc").val() == 3 || $("#pw_rcc").val() == 6) {
        if (
            $("#pw_cmc").val() == 1 ||
            $("#pw_cmc").val() == 2 ||
            $("#pw_cmc").val() == 3 ||
            $("#pw_cmc").val() == 4
        ) {
            $("#pw_cmc").removeAttr("style");
        } else {
            $("#pw_cmc").attr("style", "background-color:#ff5c5c; color:#ffffff;");
        }
    } else if ($("#pw_rcc").val() == 4) {
        if (
            $("#pw_cmc").val() == 1 ||
            $("#pw_cmc").val() == 2 ||
            $("#pw_cmc").val() == 3 ||
            $("#pw_cmc").val() == 4 ||
            $("#pw_cmc").val() == 5
        ) {
            $("#pw_cmc").removeAttr("style");
        } else {
            $("#pw_cmc").attr("style", "background-color:#ff5c5c; color:#ffffff;");
        }
    }
});

$("#src_code").change(function() {
    if ($("#supply_code").val() == 1) {
        if (
            $("#src_code").val() == 1 ||
            $("#src_code").val() == 2 ||
            $("#src_code").val() == 3 ||
            $("#src_code").val() == 4 ||
            $("#src_code").val() == 5 ||
            $("#src_code").val() == 6 ||
            $("#src_code").val() == 7 ||
            $("#src_code").val() == 8 ||
            $("#src_code").val() == 9 ||
            $("#src_code").val() == 10 ||
            $("#src_code").val() == 11 ||
            $("#src_code").val() == 14 ||
            $("#src_code").val() == 15 ||
            $("#src_code").val() == 18 ||
            $("#src_code").val() == 19
        ) {
            $("#src_code").removeAttr("style");
        } else {
            $("#src_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#supply_code").val() == 2) {
        if ($("#src_code").val() == 14 || $("#src_code").val() == 15) {
            $("#src_code").removeAttr("style");
        } else {
            $("#src_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#supply_code").val() == 3) {
        if (
            $("#src_code").val() == 1 ||
            $("#src_code").val() == 2 ||
            $("#src_code").val() == 3 ||
            $("#src_code").val() == 4 ||
            $("#src_code").val() == 5 ||
            $("#src_code").val() == 6 ||
            $("#src_code").val() == 7 ||
            $("#src_code").val() == 8 ||
            $("#src_code").val() == 9 ||
            $("#src_code").val() == 10 ||
            $("#src_code").val() == 11 ||
            $("#src_code").val() == 12 ||
            $("#src_code").val() == 13 ||
            $("#src_code").val() == 14 ||
            $("#src_code").val() == 15 ||
            $("#src_code").val() == 18 ||
            $("#src_code").val() == 19
        ) {
            $("#src_code").removeAttr("style");
        } else {
            $("#src_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#supply_code").val() == 4) {
        if (
            $("#src_code").val() == 2 ||
            $("#src_code").val() == 12 ||
            $("#src_code").val() == 14 ||
            $("#src_code").val() == 15
        ) {
            $("#src_code").removeAttr("style");
        } else {
            $("#src_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#supply_code").val() == 9) {
        if ($("#src_code").val() == 16 || $("#src_code").val() == 17) {
            $("#src_code").removeAttr("style");
        } else {
            $("#src_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    }
});

$("#food_code").change(function() {
    if ($("#food_code").val() == "W001 - Water") {
        if (
            $("#rf_code").val() == 4 ||
            $("#rf_code").val() == 5 ||
            $("#rf_code").val() == 6 ||
            $("#rf_code").val() == 8
        ) {
            $("#rf_code").removeAttr("style");
        } else {
            $("#rf_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if (
        $("#food_code").val() == "W002 - Water" ||
        $("#food_code").val() == "W003 - Water" ||
        $("#food_code").val() == "W004 - Water" ||
        $("#food_code").val() == "W005 - Water"
    ) {
        if ($("#rf_code").val() == 8) {
            $("#rf_code").removeAttr("style");
        } else {
            $("#rf_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#food_code").val() != "W001 - Water") {
        if (
            $("#rf_code").val() == 4 ||
            $("#rf_code").val() == 5 ||
            $("#rf_code").val() == 6 ||
            $("#rf_code").val() == 8
        ) {
            $("#rf_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        } else {
            $("#rf_code").removeAttr("style");
        }
    } else if (
        $("#food_code").val() != "W002 - Water" ||
        $("#food_code").val() != "W003 - Water" ||
        $("#food_code").val() != "W004 - Water" ||
        $("#food_code").val() != "W005 - Water"
    ) {
        if ($("#rf_code").val() == 8) {
            $("#rf_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        } else {
            $("#rf_code").removeAttr("style");
        }
    }
});

$("#rf_code").change(function() {
    if (
        $("#rf_code").val() == 1 ||
        $("#rf_code").val() == 2 ||
        $("#rf_code").val() == 3 ||
        $("#rf_code").val() == 7
    ) {
        if (
            $("#food_code").val() == "W001 - Water" ||
            $("#food_code").val() == "W002 - Water" ||
            $("#food_code").val() == "W003 - Water" ||
            $("#food_code").val() == "W004 - Water" ||
            $("#food_code").val() == "W005 - Water"
        ) {
            $("#rf_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        } else {
            $("#rf_code").removeAttr("style");
        }
    } else if (
        $("#rf_code").val() == 4 ||
        $("#rf_code").val() == 5 ||
        $("#rf_code").val() == 6
    ) {
        if ($("#food_code").val() == "W001 - Water") {
            $("#rf_code").removeAttr("style");
        } else {
            $("#rf_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#rf_code").val() == 8) {
        if (
            $("#food_code").val() == "W001 - Water" ||
            $("#food_code").val() == "W002 - Water" ||
            $("#food_code").val() == "W003 - Water" ||
            $("#food_code").val() == "W004 - Water" ||
            $("#food_code").val() == "W005 - Water"
        ) {
            $("#rf_code").removeAttr("style");
        } else {
            $("#rf_code").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    }
});
