@extends('layouts.main')
@section('content')
	<h1 class="my-4 text-center text-lg-left">Books</h1>
	<div class="row">
		@foreach($list as $data)
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card h-100">
				<a href="#"><img class="card-img-top" id="thumbnail" src="{{asset('/image/thumbnail/'.$data->thumbnail)}}" alt=""></a>
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