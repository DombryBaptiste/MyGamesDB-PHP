<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ezrzfezafg</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<div class="menu">
		<ul class="firstmenu">
			<li class="ps4">
				PS4
				<div class="sousmenups4">
					<ul>
						<li class="lisousmenups4">PS1</li>
						<li>PS2</li>
					</ul>
				</div>
			</li>
			<li class="xbox">
				XBOX
			</li>
			<li class="nin">
				NINTENDO
			</li>
		</ul>
	</div>
	
<script>
	$('.ps4').mouseenter(function(){
		$(".ps4").css('color', 'blue')
		$(".sousmenups4").css('opacity', "1")
		$(".sousmenups4").css('height' , 'auto')
	})

	$('.ps4').mouseleave(function(){
		$(".ps4").css('color', 'red')
		$(".sousmenups4").css('opacity', "0")
		$(".sousmenups4").css('transition', "0s")
		$(".sousmenups4").css('height' , '0px')
	})


</script>
<style type="text/css">
	
	.firstmenu{
		list-style: none;
		display: flex;
	}
	.ps4, .xbox, .nin{
		margin: 0 10px;
	}
	.sousmenups4{
		position: relative;
		left: -20px;
		opacity: 0;

	}
</style>
</body>
</html>