@extends('layouts.app')
@section('content')
<html>
<head>
<title>CreatePage</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="jumbotron" style="padding: 25px 50px 75px 100px">
<br><br>
<form action="/tag/store" method="POST">
@csrf()
<h1 class="display-4" style="margin-left: 450px;"><b>Add Tag</b></h1>
  <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Enter Tag Name</span>
  </div>
  <input type="text"  name='name' class="form-control" placeholder="Enter Tag Name" aria-label="Username" aria-describedby="basic-addon1">
</div>
@error('name')
           <small id="name" class="form-text text-danger">{{$message}}</small>     
 @enderror
<br>
<br>
<input class="btn btn-primary btn-lg" style="margin-left: 500px;" type="submit"  value="Enter tag">

</div>
</form>
</body>
</html>
@endsection