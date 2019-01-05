@include('layouts.nav')
@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row" id="detail">
		<div class="col-md-auto">
			<div class="row book-pre">
				<div class="col-lg-6 col-sm-3 book-cover">
					<img src="{{asset('image/thumbnail/'.$detail->thumbnail)}}" id="book-thumbnail" class="rounded mx-auto d-block" alt="#">	
				</div>
				<div class="col-lg-6 col-sm-9">
					<div class="row detail-title">
						<h2>Title 		-</h2>
						<h2>{{$detail->title}}</h2>	
					</div>
					<div class="row detail-author">
						<h4>Author     	-</h4>
						<h4>{{$detail->author_id}}</h4>
					</div>
					<div class="row detail-btn">
						<a href="{{route('detail.play' , ['id' => $detail->id])}}" class="btn btn-success" id="detail-play"><i class="fas fa-play"></i></a>
					</div>
					<div class="row detail-body">
						<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit adipisci, possimus consectetur dignissimos laborum temporibus? Dolorem adipisci iusto, reprehenderit velit laudantium. Similique quis dolor qui, itaque iusto, architecto dolorem perferendis!</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
