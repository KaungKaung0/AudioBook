<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Audio Books</title>
  {{-- Boostrap --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

  {{-- Audio Player --}}
  <link href="{{asset("vendor/css/styles.css")}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  @include('layouts.nav')
  <div id="container">
   <div id="header">
     @yield('slider')
   </div>
   <!-- Page Content -->
   <div id="body">
    <div id="player">
     @yield('content')
   </div> 
 </div>
 <div id="footer">
  @include('layouts.footer')
</div>
<!-- Footer -->
</div>
<!-- /.container -->
<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



{{-- Audio Player --}}

<script type="text/javascript" src="{{asset("vendor/js/jquery-1.7.2.min.js")}}"></script> 

<script type="text/javascript" src="{{asset("vendor/js/musicplayer.js")}}"></script>
<script src="{{asset('js/stream.js')}}"></script>
</body>

</html>
