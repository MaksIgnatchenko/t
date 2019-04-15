jQuery(function ($) {
    const options = {
        format: 'mm/dd/yyyy HH:mm',
        todayHighlight: true,
        autoclose: true,
    };
    $('.dateField').datepicker(options);
});