@extends('layouts.app')
@section('content')
<html>
<head>
<title>ShowPage</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<form action="/blog/store" method="POST">

<div class="jumbotron" style="background-color:#ccebff; margin: 10px 50px 75px 100px;">
<h1 style="margin-left: 450px;"><b>Blog Details</b></h1><br>
<table class="table table-bordered">
<tr>
<thead class="thead-dark">
<th>Title </th>
<th>Description</th>
<th>Category ID</th>
<th>Category Name</th>
<th>Tag Name</th>
</thead>
</tr>

<tr>
<td>{{$blog->title}}</td>
<td>{{$blog->description}}</td>
<td>{{$blog->category_id}}</td>
<td>{{$blog->category->name}}</td>
<td>
@if($blog->tags->count()>0)
@foreach($blog->tags as $tag)
#{{$tag->name}}<br>
@endforeach
@else
No Tag Available
@endif
</td>
</tr>

</table><br>
<a href="/blog/create"><button style="margin-left: 475px;" class=" btn btn-primary btn-lg">Add Another Blog</button></a>
</div>
<br>
<br>


</form>
</body>

</html>
@endsection
