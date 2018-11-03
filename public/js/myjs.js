console.log("Hello ! Welcome from MY JS.");

function playPause(){	
	var song = document.getElementById("song");
	if(song ==null){
		console.log("No song request");
	}
	else{		
		if(song.paused== true){
			$("#fa-pp").attr('class' , 'fas fa-pause');
			song.play();
			
		}
		else{
			$("#fa-pp").attr('class' , 'fas fa-play');
			song.pause();
		}
	}
}

function initProgressBar(){
	var song = document.getElementById("song");
	var length = song.duration;
	var current_time = song.currentTime;

	//calculate total length of value
	var total_length = calculateTotalValue(length);
	document.getElementById("end-time").innerHTML = total_length;

	 // calculate current value time
	 var currentTime = calculateCurrentValue(current_time);
	 document.getElementById("start-time").innerHTML = currentTime;

	//progress bar set
	 var progressbar = document.getElementById('seek-time');
	 progressbar.value = (song.currentTime / song.duration);
	 progressbar.addEventListener("click", seek);

	 if (song.currentTime == song.duration) {
	 	$("#fa-pp").attr('class' , 'fas fa-play');
	 	document.getElementById("forward").click()	;
	 }

	 function seek(event) {
	 	var percent = event.offsetX / this.offsetWidth;
	 	song.currentTime = percent * song.duration;
	 	progressbar.value = percent / 100;
	 }
	}
	function calculateTotalValue(length) {
		var minutes = Math.floor(length / 60),
		seconds_int = length - minutes * 60,
		seconds_str = seconds_int.toString(),
		seconds = seconds_str.substr(0, 2),
		time = minutes + ':' + seconds

		return time;
	}

	function calculateCurrentValue(currentTime) {
		var current_hour = parseInt(currentTime / 3600) % 24,
		current_minute = parseInt(currentTime / 60) % 60,
		current_seconds_long = currentTime % 60,
		current_seconds = current_seconds_long.toFixed(),
		current_time = (current_minute < 10 ? "0" + current_minute : current_minute) + ":" + (current_seconds < 10 ? "0" + current_seconds : current_seconds);

		return current_time;
	}

	$(function(){
		playPause();
	})