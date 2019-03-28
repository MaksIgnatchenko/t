$(document).ready(function () {
    var challengeLogoDropzone = $(".challenge-logo-dropzone").dropzone({
        url: "/admin/fileupload",
        init: function () {
            this.on('sending', function(file, xhr, formData) {
                formData.append('sign', 'challenge_logo');
            });
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        maxFiles: 1,
        maxFilesize: $(".challenge-logo-dropzone").attr('max-size') / 1024 / 1024,
        addRemoveLinks: true,
        acceptedFiles: "image/*",
        removedfile: function (file) {
            $("input[name=img_url]").val("");
            $(file._removeLink).parents('.dz-preview').remove();
        },
        success: function (e, response) {
            $("input[name=image]").val(response.data.filepath);
            $(".dashboard-image").attr('src', response.data.fullfilepath).css('display', 'block');
        }
    });

});