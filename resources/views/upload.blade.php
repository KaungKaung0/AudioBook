<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload Your Songs</title>
</head>
<body>
	@if ($errors->any())
	
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

@if(!empty($message))
<div class="alert alert-success">{{$message}}</div>
@endif

	<h3>Upload Your Songs</h3>
<div class="form-control" style="margin: 0 auto">
	<form action="{{route('song.store')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}

		<label for="title" class="form-control">Enter your song's title</label>
		<input type="text" name="title" class="form-control">

		<label for="song">Choose your song</label>
		<input type="file" name="song" class="form-control">

		<label for="vocal">Vocal Name</label>
		<input type="text" name="vocal">

		<label for="category">Category Type</label>
		<input type="text" name="category">

		<button type="submit" class="btn btn-primary form-control">Upload</button>
	</form>
</div>
</body>
</html>