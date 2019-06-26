/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 20.06.19
 *
 */

!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    SweetAlert.prototype.init = function () {

        // Delete-company
        $('.delete-company-button').click(function (e) {
            var currentElement = $(e.currentTarget);
            var url = currentElement.data('url');
            var targetLocation = currentElement.data('target-location');
            Swal.fire({
                title: 'Are you sure?',
                html: "This option will delete company!"
                    + "<br>"
                    + "All challenges will be transferred to the archive company and users will be dismissed from current company",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-success m-l-10',
                buttonsStyling: false,
                confirmButtonText: 'Yes, delete it!'
            })
            .then((result) => {
                if (result.value) {
                    $.ajax(url, {
                        method: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function () {
                            window.location = targetLocation;
                        }
                    });
                }
            })
        });
    },
        //init
        $.SweetAlert = new SweetAlert,
        $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init();
    }(window.jQuery);