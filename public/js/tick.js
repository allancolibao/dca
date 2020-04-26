$(document).ready(function () {
    $( "input.participant" ).each(function() {
        if($(this).val() != ''){
            $('#assent-btn').html('<label>INFORMED ASSENT FORM</label><span style="position:absolute;"><i class="ml-2 mb-2 text-success fa fa-check"></i></span><br>');
            $('#second-step').show();
        }
        
        if($('#sex').val() != null){
            $('#assent-btn').html('<label>INFORMED ASSENT FORM</label><span style="position:absolute;"><i class="ml-2 mb-2 text-success fa fa-check"></i></span><br>');
            $('#second-step').show();
        }

        if($('#csc').val() != null){
            $('#assent-btn').html('<label>INFORMED ASSENT FORM</label><span style="position:absolute;"><i class="ml-2 mb-2 text-success fa fa-check"></i></span><br>');
            $('#second-step').show();
        }

        if($('#educ_attainment').val() != null){
            $('#assent-btn').html('<label>INFORMED ASSENT FORM</label><span style="position:absolute;"><i class="ml-2 mb-2 text-success fa fa-check"></i></span><br>');
            $('#second-step').show();
        }

        if($("#is_caregiver:checked").val() != null){
            $('#assent-btn').html('<label>INFORMED ASSENT FORM</label><span style="position:absolute;"><i class="ml-2 mb-2 text-success fa fa-check"></i></span><br>');
            $('#second-step').show();
        }
    });
});

// Tick Screening
$(document).ready(function () {

    handleStatusChanged();

});

function handleStatusChanged() {
    $('#toggleElement_A').on('change', function () {
        toggleStatus_A();
    });
}

function toggleStatusA() {
    if ($('#toggleElement_A').is(':checked')) {
        $('#elementsToOperateOn_A :input').removeAttr('disabled');
    } else {
        $('#elementsToOperateOn_A :input').attr('disabled', true);
    }
}

// Tick Assent
function toggleStatusAssentAlready() {
    $('#assent-btn').html('<label>INFORMED ASSENT FORM</label><span style="position:absolute;"><i class="ml-2 mb-2 text-success fa fa-check"></i></span><br>');
    $('#second-step').show();
}


