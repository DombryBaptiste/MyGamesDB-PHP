<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<title>test</title>
</head>


<body>
	<script>
		const settings = {
			"async": true,
			"crossDomain": true,
			"url": "https://rawg-video-games-database.p.rapidapi.com/games/%7Bgame_pk%7D",
			"method": "GET",
			"headers": {
				"X-RapidAPI-Key": "53bf27bc8emshf5a8e9fd93a6ef6p16ece5jsnfd574a70b622",
				"X-RapidAPI-Host": "rawg-video-games-database.p.rapidapi.com"
			}
		};

		$.ajax(settings).done(function (response) {
			console.log(response);
		});
	</script>
	<?php
	
	?>
</body>
</html>