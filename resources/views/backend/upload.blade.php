@extends('backend.main')
	
	
@section('content')
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

	<h3>Upload Your Books</h3>
	
	<form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}

		<div class="form-group">
			<img src="{{asset("image/noimage.png")}}" class="mx-auto d-block" id="book-cover-design" width="200px" height="200px" />

		</div>
		<div class="btn btn-primary">
			<input type="file" name="thumbnail" id="book-cover" style="display: none">
			<span onclick="document.getElementById('book-cover').click();">Choose file</span>
		</div>
		<div class="form-group">
			<label for="title">Book's Title</label> 
			<input type="text" class="form-control" name="title">
		</div>	
		<div class="form-group">
			<label for="author">Book's Author</label>
			<input type="text" name="author" class="form-control">
		</div>
		<div class="form-group">
			<label for="category">Book's Cateogry</label>
			<input type="text" name="category" class="form-control">
		</div>
		<div class="form-group">
			<label for="song">Choose your audio</label>
			<input type="file" name="audio" class="form-control">
		</div>
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Write Description Of Your Book
					<small>Simple and fast</small>
				</h3>
			</div>

			<form method="post">
				<textarea id="summernote" name="description" placeholder="Place some text here"
				style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
			</form>
			<button type="submit" class="btn btn-primary btn-block pull-right">Upload</button>
	
		</div>


		
	</form>
	@endsection