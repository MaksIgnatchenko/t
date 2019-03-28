$(document).ready(function () {
    if ($("#video-duration-section").find( "[name='video_duration']").val()) {
        $("#video-duration-section").show();
    }
    $("[name='proof_type']").change(function () {
        if (REQUIRED_VIDEO_DURATION.includes($(this).val())) {
            $("#video-duration-section").show();
        } else {
            $("#video-duration-section").hide();
            $("#video-duration-section").find( "[name='video_duration']").val("");
        }
    });
});