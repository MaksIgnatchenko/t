$(document).ready(function () {
    $(".challenge-logo-dropzone").dropzone({
        url: "/admin/fileupload",
        init: function () {
            this.on('sending', function(file, xhr, formData) {
                formData.append('sign', CHALLENGE_LOGO_SIGN);
            });
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        maxFiles: 1,
        maxFilesize: CHALLENGE_LOGO_MAX_SIZE / 1024 / 1024,
        addRemoveLinks: true,
        acceptedFiles: "image/*",
        removedfile: function (file) {
            $("input[name=image]").val("");
            $(file._removeLink).parents('.dz-preview').remove();
        },
        success: function (e, response) {
            $("input[name=image]").val(response.data.filepath);
            $(".dashboard-image").attr('src', response.data.fullfilepath).css('display', 'block');
        }
    });

    $(".company-logo-dropzone").dropzone({
        url: "/admin/fileupload",
        init: function () {
            this.on('sending', function(file, xhr, formData) {
                formData.append('sign', COMPANY_LOGO_SIGN);
            });
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        maxFiles: 1,
        maxFilesize: COMPANY_LOGO_MAX_SIZE / 1024 / 1024,
        addRemoveLinks: true,
        acceptedFiles: "image/*",
        removedfile: function (file) {
            $("input[name=logo]").val("");
            $(file._removeLink).parents('.dz-preview').remove();
        },
        success: function (e, response) {
            $("input[name=logo]").val(response.data.filepath);
            $(".dashboard-image").attr('src', response.data.fullfilepath).css('display', 'block');
        }
    });

});