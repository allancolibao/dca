// Get the value of selected option 
$(function() {
    $("select").each(function (index, element) {
        const val = $(this).data('value');
        if(val !== '') {
            $(this).val(val);
        }
    });
});
