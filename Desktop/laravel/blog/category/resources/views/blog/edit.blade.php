@extends('layouts.app')
@section('content')
<html>
<head>
<title>EditPage</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container" >
<div class="jumbotron" style="padding: 2px 50px 75px 100px">
<br><br>
<form style="padding-right:30px;" action="/blog/{{$blog->id}}/update" method="POST">
@csrf()
@method('PUT')
<h1 style="margin-left: 370px;"><b>Add Blog</b></h1><br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Name</span>
  </div>
  <input type="text"  name='title' class="form-control" value="{{$blog->title}}"  aria-label="Username" aria-describedby="basic-addon1"></input>
</div><br>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Description</span>
  </div>
  <textarea class="form-control" name="description" value="{{$blog->description}}"  placeholder="Description of the User" aria-label="With textarea">{{$blog->description}}</textarea>
</div><br>
<div class="form-group">
  <label for="sel1">Select Category:</label>
  <select class="form-control" id="sel1" name="category_id">
    @foreach($categories as $category)
    <option
    @if($category->id==$blog->category_id)
    selected
    @endif
     value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    <br><br>
    <label for="sel1">Select Tags:</label>

  <select class="form-control" id="sel1" multiple name="tag_id[]">
    @foreach($tags as $tag)
    <option
    @foreach($blog->tags as $blog_tag)
    @if($tag->id==$blog_tag->id)
    selected
    @endif
    @endforeach
     value="{{$tag->id}}">{{$tag->name}}</option>
    @endforeach
    </select>

</div>
<br>
<br>
<input style="margin-left: 370px;"class="btn btn-primary btn-lg" type="submit"  value="Update Blog">
</div>
</form>
</div>
</body>
</html>
@endsection