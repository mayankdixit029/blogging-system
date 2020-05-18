@extends('layouts.app')
@section('content')
<html>
<head>
<title>HomePage</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container" >
<div class="jumbotron" >
<br><br>
<form action="/blog/store" method="POST">
@csrf()
  <h1 class="display-4" style="margin-left: 450px;"><b>Add Blog</b></h1>
  <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Title</span>
  </div>
  <input type="text"  name = "title" class="form-control" placeholder="Title of the blog" aria-label="Username" aria-describedby="basic-addon1">
</div>
@error('title')
           <small id="title" class="form-text text-danger">{{$message}}</small>     
   @enderror
   <br>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Description</span>
  </div>
  <textarea class="form-control" name="description" placeholder="Description of the blog" aria-label="With textarea"></textarea>
</div>
@error('description')
           <small id="description" class="form-text text-danger">{{$message}}</small>     
   @enderror
<br>
<br>
<div class="form-group">
  <label for="sel1">Select Category</label>
  <select class="form-control" id="sel1" name="category_id">
  <option selected>Choose Blog Category</option>
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    </div>
    @error('category_id')
           <small id="category_id" class="form-text text-danger">{{$message}}</small>     
   @enderror
    <br><br>
    <div class="form-group">
    <label for="sel1">Select Tag:</label>
  <select class="form-control" id="sel1" multiple name="tag_id[]">
  <option selected disabled>Choose Blog Tag</option>
    @foreach($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->name}}</option>
    @endforeach
    </select>
    </div>
    @error('tag_id')
           <small id="tag_id" class="form-text text-danger">{{$message}}</small>     
   @enderror

<input style="margin-left: 500px;" class="btn btn-primary btn-lg" type="submit"  value="Submit">

 </div>
</div>
</form>
</div>
</body>
</html>
@endsection