jQuery(document).ready(function($) {
    $(".mobileFilterToggle").click(function(event) {
        $('.izquierda.mobile .filterSelect').toggle();
        $(this).children('i').toggleClass('fa-chevron-down fa-chevron-up');
        return false;
    });
});

$(document).ready(function() {
	      $('.fancybox').fancybox({
	        type: 'iframe',
	        'padding' : 0,
	        'autoSize': true,
	        'width': '360',
	        'height': '100%'
	      });
	    });
