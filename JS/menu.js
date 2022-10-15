$('.listeonglet li').mouseenter(function(){
		$(this).children('.deroulantPS').css('transition', '1s')
		$(this).children('.deroulantPS').css('opacity', '1')
		$(this).children('.deroulantPS').css('height', '90px')
	})
	$('.listeonglet li').mouseleave(function(){
		$(this).children('.deroulantPS').css('opacity', '0')
		$(this).children('.deroulantPS').css('height', '0px')
	})

	$('.listeonglet li').mouseenter(function(){
		$(this).children('.deroulantXBOX').css('transition', '1s')
		$(this).children('.deroulantXBOX').css('opacity', '1')
		$(this).children('.deroulantXBOX').css('height', '75px')
	})
	$('.listeonglet li').mouseleave(function(){
		$(this).children('.deroulantXBOX').css('opacity', '0')
		$(this).children('.deroulantXBOX').css('height', '0px')
	})

	$('.listeonglet li').mouseenter(function(){
		$(this).children('.deroulantNINTENDO').css('transition', '1s')
		$(this).children('.deroulantNINTENDO').css('opacity', '1')
		$(this).children('.deroulantNINTENDO').css('height', '90px')
	})
	$('.listeonglet li').mouseleave(function(){
		$(this).children('.deroulantNINTENDO').css('opacity', '0')
		$(this).children('.deroulantNINTENDO').css('height', '0px')
	})

	$('.listeonglet').mouseenter(function(){
		$(this).children('.deroulantProfil').css('transition', '1s')
		$(this).children('.deroulantProfil').css('opacity', '1')
		$(this).children('.deroulantProfil').css('height', '90px')
	})
	$('.listeonglet').mouseleave(function(){
		$(this).children('.deroulantProfil').css('opacity', '0')
		$(this).children('.deroulantProfil').css('height', '0px')
	})
