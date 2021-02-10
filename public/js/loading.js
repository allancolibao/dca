$(document).ready(function () {
    $(".send").click(function () {
        $("#loading").removeAttr('style');
    });
});


$(document).ready(function () {
    $(".backup").click(function () {
        $("#loading-backup").removeAttr('style');

        setTimeout(() => {
            $("#loading-backup").attr('style', 'display:none');
        }, 3000)
    });
});