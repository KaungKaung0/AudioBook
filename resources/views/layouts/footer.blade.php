@if(isset($audio))
<div class="footer">
	<div class="row">
		<div class="example">
			<ul class="playlist">
				<li data-cover="{{asset('image/thumbnail/'.$detail->thumbnail)}}" data-artist="{{$detail->author_id}}">
					<a href="{{url('/stream/'.$audio->token.'/'.$audio->id)}}" style="visibility: hidden;">{{$audio->file_name}}</a>
				</li>

			</ul>
		</div>
	</div>
</div>	
@endif