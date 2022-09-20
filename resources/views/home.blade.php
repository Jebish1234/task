@extends('welcome')
 
 @section('title', 'Home')
 
 @if($errors->any())
 
 <div class="alert alert-danger" role="alert">
    <ul>
    {!! implode('', $errors->all('<li>:message</li>')) !!}
    </ul>
</div>
 
 @endif
  
 @section('content')
  <div >
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand btn btn-primary" href="logout" style="font-size:15px">Logout</a>
    </nav>
  </div>
  <u><p>welcome <b>{{auth()->user()->name}} </b></p></u>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">address</th>
      <th scope="col">state</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($data as $da)
    <tr>
      <td>{{$da->id}}</td>
      <td>{{$da->name}}</td>
      <td>{{$da->email}}</td>
      <td>{{$da->phone}}</td>
      <td>{{$da->address}}</td>
      <td>{{$da->state}}</td>
    </tr>

    @endforeach
    
  </tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item ">
      {{$data->links()}}
    </li>
  </ul>
</nav>

@stop