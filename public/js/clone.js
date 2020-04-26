let regex = /^(.*)(\d)+$/i;
let cindex = 1;

$("input.tr_clone_add").on('click', function () {
    let $tr = $(this).closest('.tr_clone');
    let $clone = $tr.clone(true);
    cindex++;
    $clone.find('.remove').click(function (e) {

        // target row
        let $remove = $(this).closest('.tr_clone');

        // show the modal
        $('#remove-clone').modal('show');

        // remove the clone
        $('#proceed').click(function (e) {
            $remove.remove();
            $('#remove-clone').modal('hide');
        });
        
        e.preventDefault();
    });
    
    // Set the clone input to default
    $clone.find(':text').val('');
    $clone.find('#line_no').val('');
    $clone.find('#food_weight').val('');
    $clone.find('#unit_cost').val('');
    $clone.find('#unit_weight').val('');
    $clone.find('#cmc').removeAttr('style');
    $clone.find('#src_code').removeAttr('style');
    $clone.find('#rf_code').removeAttr('style');

     //update row id
    $clone.attr('id', 'line-' + (cindex));

    //update ids of elements in row
    $clone.find("*").each(function () {
        let id = this.id || "";
        let match = id.match(regex) || [];
        if (match.length == 3) {
            this.id = match[1] + (cindex);
        }
    });

    // Custom validation
    $("#save-record-btn").click( function(){
        $clone.find('#line_no').each(function(){
            let value = $(this).val();
            let i = 0;
            i++;
            if(value === '' || value.length < 2){
                toastr.error('Found an error! Check row number '+ i +' Line number is required & must be 2 characters.');
            } else {
                $('#save-record').modal('show');
            }
        });
    });

    $clone.find("#cmc").change(function () {
        if ($clone.find("#rcc").val() == 1 || $clone.find("#rcc").val() == 2 || $clone.find("#rcc").val() == 5) {
            if ($clone.find("#cmc").val() != 6) {
                $clone.find("#cmc").attr("style", "background-color:#ff5c5c; color:#ffffff;");
            } else {
                $clone.find("#cmc").removeAttr("style");
            }
        } else if ($clone.find("#rcc").val() == 3 || $clone.find("#rcc").val() == 6) {
            if (
                $clone.find("#cmc").val() == 1 ||
                $clone.find("#cmc").val() == 2 ||
                $clone.find("#cmc").val() == 3 ||
                $clone.find("#cmc").val() == 4
            ) {
                $clone.find("#cmc").removeAttr("style");
            } else {
                $clone.find("#cmc").attr("style", "background-color:#ff5c5c; color:#ffffff;");
            }
        } else if ($clone.find("#rcc").val() == 4) {
            if (
                $clone.find("#cmc").val() == 1 ||
                $clone.find("#cmc").val() == 2 ||
                $clone.find("#cmc").val() == 3 ||
                $clone.find("#cmc").val() == 4 ||
                $clone.find("#cmc").val() == 5
            ) {
                $clone.find("#cmc").removeAttr("style");
            } else {
                $clone.find("#cmc").attr("style", "background-color:#ff5c5c; color:#ffffff;");
            }
        }
    });

    $clone.find("#src_code").change(function () {
        if ($clone.find("#supply_code").val() == 1) {
            if (
                $clone.find("#src_code").val() == 1 ||
                $clone.find("#src_code").val() == 2 ||
                $clone.find("#src_code").val() == 3 ||
                $clone.find("#src_code").val() == 4 ||
                $clone.find("#src_code").val() == 5 ||
                $clone.find("#src_code").val() == 6 ||
                $clone.find("#src_code").val() == 7 ||
                $clone.find("#src_code").val() == 8 ||
                $clone.find("#src_code").val() == 9 ||
                $clone.find("#src_code").val() == 10 ||
                $clone.find("#src_code").val() == 11 ||
                $clone.find("#src_code").val() == 14 ||
                $clone.find("#src_code").val() == 15 ||
                $clone.find("#src_code").val() == 18 ||
                $clone.find("#src_code").val() == 19
            ) {
                $clone.find("#src_code").removeAttr("style");
            } else {
                $clone.find("#src_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#supply_code").val() == 2) {
            if ($clone.find("#src_code").val() == 14 || $clone.find("#src_code").val() == 15) {
                $clone.find("#src_code").removeAttr("style");
            } else {
                $clone.find("#src_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#supply_code").val() == 3) {
            if (
                $clone.find("#src_code").val() == 1 ||
                $clone.find("#src_code").val() == 2 ||
                $clone.find("#src_code").val() == 3 ||
                $clone.find("#src_code").val() == 4 ||
                $clone.find("#src_code").val() == 5 ||
                $clone.find("#src_code").val() == 6 ||
                $clone.find("#src_code").val() == 7 ||
                $clone.find("#src_code").val() == 8 ||
                $clone.find("#src_code").val() == 9 ||
                $clone.find("#src_code").val() == 10 ||
                $clone.find("#src_code").val() == 11 ||
                $clone.find("#src_code").val() == 12 ||
                $clone.find("#src_code").val() == 13 ||
                $clone.find("#src_code").val() == 14 ||
                $clone.find("#src_code").val() == 15 ||
                $clone.find("#src_code").val() == 18 ||
                $clone.find("#src_code").val() == 19
            ) {
                $clone.find("#src_code").removeAttr("style");
            } else {
                $clone.find("#src_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#supply_code").val() == 4) {
            if (
                $clone.find("#src_code").val() == 2 ||
                $clone.find("#src_code").val() == 12 ||
                $clone.find("#src_code").val() == 14 ||
                $clone.find("#src_code").val() == 15
            ) {
                $clone.find("#src_code").removeAttr("style");
            } else {
                $clone.find("#src_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#supply_code").val() == 9) {
            if ($clone.find("#src_code").val() == 16 || $clone.find("#src_code").val() == 17) {
                $clone.find("#src_code").removeAttr("style");
            } else {
                $clone.find("#src_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        }
    });

    $clone.find("#food_code").change(function () {
        if ($clone.find("#food_code").val() === "W001 - Water") {
            if (
                $clone.find("#rf_code").val() == 4 ||
                $clone.find("#rf_code").val() == 5 ||
                $clone.find("#rf_code").val() == 6 ||
                $clone.find("#rf_code").val() == 8
            ) {
                $clone.find("#rf_code").removeAttr("style");
            } else {
                $clone.find("#rf_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#food_code").val() === "W002 - Water" || $clone.find("#food_code").val() === "W003 - Water" || $clone.find("#food_code").val() === "W004 - Water" || $clone.find("#food_code").val() === "W005 - Water") {
            if ($clone.find("#rf_code").val() == 8) {
                $clone.find("#rf_code").removeAttr("style");
            } else {
                $clone.find("#rf_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#food_code").val() != "W001 - Water") {
            if (
                $clone.find("#rf_code").val() == 4 ||
                $clone.find("#rf_code").val() == 5 ||
                $clone.find("#rf_code").val() == 6 ||
                $clone.find("#rf_code").val() == 8
            ) {
                $clone.find("#rf_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            } else {
                $clone.find("#rf_code").removeAttr("style");
            }
        } else if ($clone.find("#food_code").val() != "W002 - Water" || $clone.find("#food_code").val() != "W003 - Water" || $clone.find("#food_code").val() != "W004 - Water" || $clone.find("#food_code").val() != "W005 - Water") {
            if ($clone.find("#rf_code").val() == 8) {
                $clone.find("#rf_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            } else {
                $clone.find("#rf_code").removeAttr("style");
            }
        }
    });

    $clone.find("#rf_code").change(function () {
        if ($clone.find("#rf_code").val() == 1 || $clone.find("#rf_code").val() == 2 || $clone.find("#rf_code").val() == 3 || $clone.find("#rf_code").val() == 7) {
            if ($clone.find("#food_code").val() == "W001 - Water" || $clone.find("#food_code").val() == "W002 - Water" || $clone.find("#food_code").val() == "W003 - Water" || $clone.find("#food_code").val() == "W004 - Water" || $clone.find("#food_code").val() == "W005 - Water") {
                $clone.find("#rf_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            } else {
                $clone.find("#rf_code").removeAttr("style");
            }
        } else if ($clone.find("#rf_code").val() == 4 || $clone.find("#rf_code").val() == 5 || $clone.find("#rf_code").val() == 6) {
            if ($clone.find("#food_code").val() == "W001 - Water") {
                $clone.find("#rf_code").removeAttr("style");
            } else {
                $clone.find("#rf_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#rf_code").val() == 8) {
            if ($clone.find("#food_code").val() == "W001 - Water" || $clone.find("#food_code").val() == "W002 - Water" || $clone.find("#food_code").val() == "W003 - Water" || $clone.find("#food_code").val() == "W004 - Water" || $clone.find("#food_code").val() == "W005 - Water") {
                $clone.find("#rf_code").removeAttr("style");
            } else {
                $clone.find("#rf_code").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        }
    });

    $tr.after($clone);
});
