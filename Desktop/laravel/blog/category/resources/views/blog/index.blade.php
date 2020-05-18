@extends('layouts.app')
@section('content')
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>

<div class="container" >
    <div class="jumbotron" >
<h1 style="margin-left: 450px;"> <b>All Blogs</b></h1><br>
<form class="form-inline">
  <div class="form-group mb-2">
    <label for="title" class="sr-only">Title</label>
    <input type="text"  class="form-control" name="title" placeholder="Title" >
  </div>
  <div class="form-group  mb-2">
    <label for="inputPassword2" class="sr-only">Category ID</label>
    <input type="text" class="form-control" style="margin-left:25px" name="category" placeholder="Category ID">
  </div>
  <button type="submit" style="margin-left:25px" class="btn btn-primary mb-2">Search</button>
</form>
<a href="/blog/create"><button style="margin-left:370px;" class=" btn btn-primary mb-2 ">Add New Blogs</button></a>
<table class="table table-dark">
<tr>
                    <th scope="col">Sr.No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
</tr>
@foreach($blogs as $index=>$blog)
<tr>
<th scope="row">{{$index + $blogs->firstItem()}}</th>
<td>{{$blog->title}}</td>
<td>{{$blog->category_id}}</td>
<td>{{$blog->created_at->diffForHumans()}}</td>
<td>{{$blog->updated_at->diffForHumans()}}</td>
<td>{{$blog->category->name}}</td>
<td>
<a href="/blog/{{$blog->id}}/show" class="btn btn-primary"><i class="fa fa-eye"></i>Show</a></td>
<td>
    <a href="/blog/{{$blog->id}}/edit"><button class="btn btn-warning">Edit</button></a>
</td>
<td>
<form method="POST" action="/blog/{{$blog->id}}/delete">
    @csrf()
    @method('delete')
    
        <button class="btn btn-danger" >Delete</button>
    
    @endforeach
</form>
</td>
</tr>
</table><br><br>
{{$blogs->appends($_GET)->links()}}
</div>
<div class="container">
    <div class="col"></div>
    <div class="col">
        @if (session('danger'))
            <div class="alert alert-danger" role="alert">
                {{ session('danger') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="col"></div>
</div>
</body>
</html>
@endsection