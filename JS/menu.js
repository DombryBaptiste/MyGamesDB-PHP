$('.li_console').mouseenter(function(){
	$(this).children('.deroulantPS').css('opacity', '1')
	$(this).children('.deroulantPS').css('height', 'auto')
})
$('.li_console').mouseleave(function(){
	$(this).children('.deroulantPS').css('opacity', '0')
	$(this).children('.deroulantPS').css('height', '0px')
})

$('.li_console').mouseenter(function(){
	$(this).children('.deroulantXBOX').css('opacity', '1')
	$(this).children('.deroulantXBOX').css('height', 'auto')
})
$('.li_console').mouseleave(function(){
	$(this).children('.deroulantXBOX').css('opacity', '0')
	$(this).children('.deroulantXBOX').css('height', '0px')
})

$('.li_console').mouseenter(function(){
	$(this).children('.deroulantNINTENDO').css('opacity', '1')
	$(this).children('.deroulantNINTENDO').css('height', 'auto')
})
$('.li_console').mouseleave(function(){
	$(this).children('.deroulantNINTENDO').css('opacity', '0')
	$(this).children('.deroulantNINTENDO').css('height', '0px')
})

$('.li_profil').mouseenter(function(){
	$(this).children('.deroulantPROFIL').css('opacity', '1')
	$(this).children('.deroulantPROFIL').css('height', 'auto')
})

$('.li_profil').mouseleave(function(){
	$(this).children('.deroulantPROFIL').css('opacity', '0')
	$(this).children('.deroulantPROFIL').css('height', '0px')
})


$('.pseudoconnected').mouseenter(function(){

	$('.deroulantProfil').css('opacity', '1')
	$('.deroulantProfil').css('height', 'auto')
	$('.deroulantProfil').children('deroulantProfil').css('opacity', '1')
	$('.deroulantProfil').children('deroulantProfil').css('height', 'auto')

	
})


$('.pseudoconnected').mouseleave(function(){
	$('.deroulantProfil').css('opacity', '0')
	$('.deroulantProfil').css('height', '0px')
})


$(document).ready(function() {
    $('input').keyup(function(event) {
        if (event.which === 13)
        {
            event.preventDefault();
            $('.form_recherche').submit();
        }
    });
});