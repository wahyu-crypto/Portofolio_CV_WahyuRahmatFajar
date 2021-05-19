@extends('rental.master')

@section('title')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Show Data Car</h1>
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

<div class="jumbotron">
    <img class="card-img-top" src="{{ asset('/img/'.$mobil->poster)}}" alt="Card image cap">
    <h1 class="display-4">{{ $mobil->nama}}</h1>
    <h3 class="lead">{{ $mobil->desc }}</h3>
    <p class="lead">Price / Day : {{ $mobil->harga }}</p>
    <hr class="my-4">
  </div>
@endsection