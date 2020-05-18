@extends('layouts.app')
@section('content')
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

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
<div class="container">
    <div class="jumbotron">
<h1 style="margin-left: 425px;"><b> All Categories</b></h1><br>

<form class="form-inline">
  <div class="form-group mb-2">
    <label for="name" class="sr-only">Category Name</label>
    <input type="text"  class="form-control" name="name" value="{{$categoryname}}" placeholder="Category Name" >
  </div>
  <button type="submit" style="margin-left:25px" class="btn btn-primary mb-2">Search</button>
</form>
<a href="/category/create"><button style="margin-left: 580px;" class=" btn btn-primary  mb-2">Add New Category</button></a>
<table class="table table-dark">
<tr>
<th scope="col">Sr.No.</th>
<th>Category name </th>
<th>Created By</th>
<th>Action</th>
</tr>
@foreach($categories as $index =>$category)
<tr>
<th scope="row">{{$index + $categories->firstItem()}}</th>
<td>{{$category->name}}</td>
<td> 
@if($category->user_id)
{{$category->user->name}}
@else
None
@endif

</td>
<td><a href="/category/{{$category->id}}/show"><button class="btn btn-primary">Show</button></a></td>
<td><a href="/category/{{$category->id}}/edit"><button class="btn btn-warning">Edit</button></a></td>
  <td>
        <form method="POST" action="/category/{{$category->id}}/delete">
                 @csrf()
                  @method('delete')

                   <a><button class="btn btn-danger">Delete</button></a> 
                  
             
        </form>
     </td>
</tr>
@endforeach
</table>
{{$categories->appends($_GET)->links()}}
</div>
</body>
</html>
@endsection