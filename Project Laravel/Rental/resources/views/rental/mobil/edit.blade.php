@extends('rental.master')

@section('title')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Car</h1>
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

<div class="card card-primary ml-2 mr-2">
  <div class="card-header">
    <h3 class="card-title">Edit Car : {{ $mobil->id }}</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" action="/mobil/{{ $mobil->id }}" method="POST" enctype="multipart/form-data" >
  @csrf
  @method('PUT')
    <div class="card-body">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="nama" class="form-control" name="nama" id="nama" value="{{ old('nama', $mobil->nama) }}" placeholder="Enter Name Car">
        @error('nama')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        </div>
        <div class="form-group">
          <label for="desc">Description</label>
          <input type="desc" class="form-control" name="desc" id="desc" value="{{ old('desc', $mobil->desc) }}" placeholder="Enter Description Car">
          @error('desc')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
          @enderror
        </div>
      <div class="form-group">
        <label for="harga">Harga</label>
        <input type="harga" class="form-control" name="harga" id="harga" value="{{ old('harga', $mobil->harga) }}" placeholder="Enter Price">
        @error('harga')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="poster">Poster</label>
        <input type="file" class="form-control" id="poster" name="poster" required>
        @error('poster')
        <div class="alert alert-danger">{{ $message }} </div>
        @enderror
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">UPDATE</button>
    </div>
  </form>
</div>
@endsection