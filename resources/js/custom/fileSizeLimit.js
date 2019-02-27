jQuery(function($){
    $('.file').change(function() {
        if (this.files[0].size > imageSizeLimit) {
            alert("The image should be no more than " + imageSizeLimit / 1024 + "Kb");
            this.value = '';
        }
    });
});