@extends('layouts.app')
@section('content')
<html>
<head>
<title>EditPage</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container" >
<div class="jumbotron" style="padding: 25px 50px 75px 100px">
<br><br>
<form action="/tag/{{$tag->id}}/update" method="POST">
@csrf()
@method('PUT')
<h1 style="margin-left: 370px;"><b>Add Tag</b></h1><br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Name</span>
  </div>
  <input type="text"  name='name' class="form-control" value="{{$tag->name}}" placeholder="Name of the User" aria-label="Username" aria-describedby="basic-addon1"></input>
</div>
@error('name')
<small id="name" class="form-text text-danger">{{$message}}</small>     
@enderror
<br>
<br>
<input style="margin-left: 370px;"class="btn btn-primary btn-lg" type="submit"  value="Update Tag">
</div>
</form>
</div>
</body>
</html>
@endsection