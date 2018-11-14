@extends('backend.main')
@section('content')
<a href="{{route('admin.create')}}" class="btn btn-primary">Upload A new Book</a>
<button class="btn btn-primary" onclick="showRoleForm()">Add Role</button>
<form action="{{route('admin.add_role')}}" method="POST" id="RoleForm" style="display: none;">
	{{csrf_field()}}
	<label for="name">Role Name</label>
	<input type="text" class="form-control" name="name">
	<button type="submit" class="btn btn-info">Add</button>
</form>
<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Thumbnail</th>
					<th scope="col">Title</th>
					<th scope="col">Author</th>
					<th scope="col">Description</th>
					<th scope="col">Category</th>
					<th scope="col"></th>
					<th scope="col">Add Count</th>
				</tr>
			</thead>
			<tbody>
				@foreach($list as $data)
				<tr>
					<th><img src="{{asset("image/thumbnail/" . $data->thumbnail)}}" alt="" id="album_art"></th>
					<th scope="row">{!!$data->title!!}</th>
					<th>{!!$data->author!!}</th>
					<th>{!!$data->description!!}</th>
					<th>{!!$data->category!!}</th>
					<th>
						<a href="{{route('admin.index',['id'=>$data->id])}}"><i class="fas fa-play"></i></a>
						@if(isset($audio))
						<audio src="{{asset('audio/'. $audio->file_name . '.mp3')}}" id="song"></audio>
						@endif
					</th>
					<th>{{$data->add_count}}</th>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection