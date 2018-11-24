@if(isset($audio))
<footer class="footer fixed-bottom footer-controller">
	<div class="container">
		<div class="row">
			<div class="col foot-book-margin">
				<img class="footer-book-cover-size" src="{{asset("image/thumbnail/" . $thumb->thumbnail)}}" alt="" id="album_art">
			</div>
			<div class="col col-controller">
				<p>{{$audio->file_name}}</p>
			</div>
			<div class="col col-controller">
				<audio id="song" src="{{asset('audio/'.$audio->file_name . '.mp3')}}" ontimeupdate="initProgressBar()"></audio>
				<span>
					<progress id="seek-time" value="0" max="1"></progress>
				</span>
				<small style="float:left; position: relative; left:20px;" id="start-time"></small>
				<small style="float:right; position: relative; right:20px;" id="end-time"></small>
			</div>
			<div class="col col-controller">
				<div class="row">
					<div class="backward-fa">
						<a href="{{route('select',['id'=>$audio->id,'ask'=>"backward"])}}" ><i class="fas fa-backward change-color-fa"></i></a>
					</div>
					<div class="play-fa">
						<i id="fa-pp" class="fas fa-play" onclick="playPause()"></i>
					</div>
					<div class="forward-fa">
						<a href="{{route('select',['id'=>$audio->id,'ask'=>"forward"])}}" id="forward"><i class="fas fa-forward change-color-fa"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>		
</footer>
@endif