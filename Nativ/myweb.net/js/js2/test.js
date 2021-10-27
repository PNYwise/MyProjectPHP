$('.page-scroll').on('click',function(e){
	var tujuan = $(this).attr('href');
	var elementujuan = $(tujuan);

	$('html , body') animate({
		scrollTop: elementujuan.offset().top - 50
	}, 2000,'easeInOutExpo');
})
