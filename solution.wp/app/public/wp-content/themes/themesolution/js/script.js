  jQuery(document).on("ready",function(){ // quand le document est prêt
    $('.carousel-slick').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
});

$(document).ready(function() {
	$('myCarousel').carousel({
	interval: 5000
	}) 
});

