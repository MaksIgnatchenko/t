$(document).ready(function () {
    $(".change-proof-status-button").on("click", function() {
        var newStatus = $(this).attr('status');
        $('[name=status]').val(newStatus);
        $('.hidden-submit').click();
    });
});

