$(".audio_player").musicPlayer({
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
	onFwd: function() {},
	
	onRew: function() {},
});
