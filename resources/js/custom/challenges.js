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

    if($('select[name=company_id]').val()) {
        $('#country-component').hide();
        $('#city-component').hide();
    }

    $('select[name=company_id]').change(function() {
        if( $(this).val() ) {
            $('#country-component').hide();
            $('#country-component').find("option").removeAttr('selected');
            $('#country-component').find("select").val("");
            $('#city-component').hide();
            $('#city-component').find("input").val('');
        } else {
            $('#country-component').show();
            $('#city-component').show();
        }
    });
});