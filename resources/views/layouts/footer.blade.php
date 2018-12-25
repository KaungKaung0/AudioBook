@if(isset($audio))
<footer class="footer fixed-bottom">
	<div class="container">
		<div class="row">
			<div class="example">
				<ul class="playlist">
					<li data-cover ="{{asset('public/image/' . $thumb->thumbnail)}}" data-artist = "ExampleArtist">
						<a href="{{url('/stream/'.$audio->token.'/1')}}">{{$audio->file_name}}</a>
					</li>
				</ul>
			</div>
		</div>
	</div>		
</footer>

@endif