jQuery(document).ready(function($) {
    $(".mobileFilterToggle").click(function(event) {
        $('.izquierda.mobile .filterSelect').toggle();
        $(this).children('i').toggleClass('fa-chevron-down fa-chevron-up');
        return false;
    });
});
