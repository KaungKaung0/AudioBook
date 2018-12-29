@include('layouts.nav')
@include('layouts.header')

@extends('layouts.main')
@section('content')
	<div class="row">
	<div class="col-lg-9 col-md-8 col-sm-5 col-12"><h1 class="my-4 text-left">Trendings</h1></div>
	<div class="col-lg-1 col-md-2 col-sm-3 col-6"><button type="button" class="my-4 btn btn-outline-secondary">More</button></div>
	<div class="col-lg-1 col-md-1 col-sm-2 col-3"><button type="button" class="my-4 btn btn-outline-secondary"><</button></div>
	<div class="col-lg-1 col-md-1 col-sm-2 col-3"><button type="button" class="my-4 btn btn-outline-secondary">></button></div>
	</div>
	<div class="row">
		@foreach($list as $data)
		<div class="col-lg-3 col-sm-6 portfolio-item card_item">
			<div class="card h-100">
				<a href="{{route('player' , ['id' =>$data->id])}}"><img class="card-img-top card_cover" id="thumbnail" src="{{asset('/image/thumbnail/'.$data->thumbnail)}}" alt=""></a>
				<div class="card-body">
					<h4 class="card-title">
						<p>{!!$data->title!!}</p>
					</h4>
					<p class="card-text">{!!str_limit($data->description,120)!!}</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	{{-- paginate links --}}
	{{$list->links()}}
	<h1 class="my-4 text-center text-lg-left">New Arrivals</h1>
	<div class="row">
		@foreach($list as $data)
		<div class="col-lg-4 col-sm-6 portfolio-item card_item">
			<div class="card h-100">
				<a href="#"><img class="card-img-top card_cover" id="thumbnail" src="{{asset('/image/thumbnail/'.$data->thumbnail)}}" alt=""></a>
				<div class="card-body">
					<h4 class="card-title">
						<p>{!!$data->title!!}</p>
					</h4>
					<p class="card-text">{!!str_limit($data->description,120)!!}</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</main>

@endsection
