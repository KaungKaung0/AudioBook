<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Player</title>
	<link href="{{asset("vendor/css/styles.css")}}" rel="stylesheet">

</head>
<body>
	<div class="example">
		<ul class="playlist">
			<li data-cover ="{{asset("image/thumbnail/Saung.jpg")}}" data-artist = "ExampleArtist">
				<a href="{{url('/stream/'.$audio->token.'/1')}}">{{$audio->file_name}}</a>
			</li>
		</ul>
	</div>




	<script type="text/javascript" src="{{asset("vendor/js/jquery-1.7.2.min.js")}}"></script> 

	<script type="text/javascript" src="{{asset("vendor/js/musicplayer.js")}}"></script>


	<script>
		$(".example").musicPlayer({
			elements: ['artwork', 'information', 'controls', 'progress', 'time', 'volume'],

			onPlay: function () {
				$('body').css('background', 'black');
			},
			onPause: function () {
				$('body').css('background', 'green');
			},
			onStop: function () {
				$('body').css('background', '#141942');
			},
		});

	</script>
</body>
</html>