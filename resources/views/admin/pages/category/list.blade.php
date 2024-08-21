@extends('admin.master')

@section('content')
<h1>Category List</h1>

<a href="{{route('category.create')}}" class="btn btn-success">Create New Category</a>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">status</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($categories as $key=>$category )
     <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->status}}</td>
      <td>
        <a href="" class="btn btn-success">View</a>
        <a href="" class="btn btn-warning">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
     @endforeach
      
    </tbody>
  </table> 
  @endsection