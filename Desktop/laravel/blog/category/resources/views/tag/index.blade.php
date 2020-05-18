@extends('layouts.app')
@section('content')
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="jumbotron">
    <h1  style="margin-left: 460px;"><b>All Tags</b></h1><br>


<form class="form-inline">
  <div class="form-group mb-2">
    <label for="name" class="sr-only">Tag Name</label>
    <input type="text"  class="form-control" name="name" value="{{$tagname}}" placeholder="Tag Name" >
  </div>
  <button type="submit" style="margin-left:25px" class="btn btn-primary mb-2">Search</button>
</form>
<a href="/tag/create"><button style="margin-left: 660px;"class=" btn btn-primary mb-2 ">Add Tag</button></a>
<table class="table table-dark">
<tr>
<th scope="col">Sr. No.</th>
<th>Tag Name</th>
<th>Action</th>
</tr>

@foreach($tags as $index =>$tag)
<tr>
<th scope="row">{{$index + $tags->firstItem()}}</th>
<td>{{$tag->name}}</td>
<td><a href="/tag/{{$tag->id}}/show"><button class="btn btn-primary">Show</button></a></td>
<td>
    <a href="/tag/{{$tag->id}}/edit"><button class="btn btn-warning">Edit</button></a>
</td>
<form method="POST" action="/tag/{{$tag->id}}/delete">
    @csrf()
    @method('delete')
    <td>
        <button class="btn btn-danger">Delete</button>
    </td> 
    @endforeach
</form>

</table>
{{$tags->appends($_GET)->links()}}
</div>
</body>
</html>
@endsection