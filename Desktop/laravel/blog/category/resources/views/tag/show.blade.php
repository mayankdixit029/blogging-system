@extends('layouts.app')
@section('content')
<html>
<head>
<title>ShowPage</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<table class="table table-bordered">
<tr>
<thead class="thead-dark">
<th>Tag Name </th>
<th>Blog Title</th>
</thead>
</tr>

<tr>
<td>{{$tag->name}}</td>
<td>
@foreach($tag->blogs as $blog)
#{{$blog->title}}<br>
@endforeach
</td>
</tr>
</table>
<br>
<br>

<a href="/category/create"><button class=" btn btn-primary btn-lg " style="margin-left:550px;">Add New Category</button></a>
</body>

</html>

@endsection