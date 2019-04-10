$(document).ready(function () {
    $(".change-proof-status-button").on("click", function() {
        var newStatus = $(this).attr('status');
        $('[name=status]').val(newStatus);
        $('#change-status').click();
    });

    $( ".video_proof" ).each(function() {
        let video = $(this).find('video');
        if (!video[0].canPlayType('video/mp4')) {
            video.remove();
            $(this).find('.video-format-no-supported').show();
        }
    });
});

