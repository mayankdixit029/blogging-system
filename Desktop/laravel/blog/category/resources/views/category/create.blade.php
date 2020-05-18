@extends('layouts.app')
@section('content')
<html>
<head>
<title>HomePage</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="jumbotron" style="padding: 25px 50px 75px 100px">
<br><br>
<form action="/category/store" method="POST">
@csrf()
  <h1 class="display-4">Fill the form!!</h1>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Name</span>
  </div>
  <input type="text"  name='name' class="form-control" placeholder="Name of the User" aria-label="Username" aria-describedby="basic-addon1">
  
</div>
@error('name')
           <small id="name" class="form-text text-danger">{{$message}}</small>     
   @enderror

<br>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Description</span>
  </div>
  <textarea class="form-control" name="description" placeholder="Description of the User" aria-label="With textarea"></textarea> 
</div>
@error('description')
           <small id="description" class="form-text text-danger">{{$message}}</small>     
   @enderror

<br>
<br>
<input class="btn btn-primary btn-lg" type="submit"  value="Submit">
</div>
</form>
</body>
</html>
@endsection