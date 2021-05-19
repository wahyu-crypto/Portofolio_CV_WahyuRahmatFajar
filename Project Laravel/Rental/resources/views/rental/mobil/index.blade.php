@extends('rental.master')

@section('title')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Data Car</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
<a class="btn btn-primary mb-2 ml-3" href="/mobil/create">Create New Car</a>
<div class="row ml-2">
@foreach ($mobil as $value)
  <div class="col-3">
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="{{ asset('/img/'.$value->poster)}}" alt="Card image cap">
      <div class="card-body">
        <h1 class="card-title">Name Car : {{$value->nama}}</h1>
        <p class="card-text">Price / Day : {{$value->harga}}</p>
        <form action="/mobil/{{$value->id}}" method="POST">
          <a href="/mobil/{{$value->id}}" class="btn btn-info btn-sm">Show</a>
          <a href="/mobil/{{$value->id}}/edit" class="btn btn-default btn-sm">Edit</a>
          @csrf
          @method('DELETE')
          <input type="submit" value="delete" class="btn btn-danger btn-sm">
        </form>
      </div>
    </div>
  </div>
@endforeach
</div>
@endsection