jQuery(function ($) {
    const options = {
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
    };
    $('.dateField').datepicker(options);
});