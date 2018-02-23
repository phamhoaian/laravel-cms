$(function(){
	setTimeout(function() {
        $('body').addClass('is-loaded')
    }, 600);

	$('button.mo-nav-button').click(function(){
		if ($('body').hasClass('main-nav-open'))
		{
			$('body').removeClass('main-nav-open');
		}
		else
		{
			$('body').addClass('main-nav-open');
		}
	});

	$('.mo-nav-item').click(function(){
		$('.mo-nav-sub').hide('slow');
		$('.mo-nav-item').removeClass('has-dropdown');
		
		var sub_menu = $(this).find('.mo-nav-sub');
		if (sub_menu)
		{
			$(this).toggleClass('has-dropdown');
			sub_menu.slideToggle('slow');
		}
	});

	var allPanels = $('.career > dd').hide();
	$('.career > dt').click(function(){
		allPanels.slideUp();

		if ( ! $(this).hasClass('active'))
		{
			$('.career > dt').removeClass('active');
			$(this).addClass('active');
			$(this).next().slideDown();
		}
		else
		{
			$(this).removeClass('active');
		}
	});

	$('#btn-apply').click(function(){
		$(this).hide();
		$('dl.career').slideToggle();
		$(this).parent().addClass('show-career');
	});

	$('.mo-brand-logo').click(function(){
		$('.mo-branch-info').animate({opacity: 1}, 500);
		$('.mo-galleries').slideToggle();
	});
});

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}