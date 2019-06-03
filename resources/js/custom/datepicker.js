jQuery(function ($) {
    const options = {
        format: 'mm/dd/yyyy HH:mm',
        todayHighlight: true,
        autoclose: true,
    };
    $('.dateField').datepicker(options);

    $('.air-datepicker').each(function(picker) {
        var date = new Date();
        date.setMinutes(0);
        $(this).datepicker({
            dateFormat: 'yyyy-mm-dd',
            timepicker: true,
            timeFormat:'hh:ii',
            position: "top left",
            startDate: date,
            onShow: function(inst, animationCompleted) {
                $('.datepicker--time-sliders').each(function() {
                    $(this).children().last().css('display', 'none');
                });
            }
        });
    });
});
