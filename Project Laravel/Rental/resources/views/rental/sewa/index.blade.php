@extends('rental.master')

@section('title')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Customer</h1>
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

<section class="content">
    <!-- Default box -->
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Table Customers</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        </div>
    </div>
    <div class="card-body">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a class="btn btn-primary mb-2" href="/sewa/create">Create New Customer</a>
        <table class="table table-bordered">
            <thead>                  
            <tr>
                <th style="width: 10px">No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Number Phone</th>
                <th>Rent Time</th>
                <th>Name Car</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
        @forelse($sewa as $key => $rent)
            <tr>
                <td> {{ $key + 1 }} </td>
                <td> {{ $rent->nama}} </td>
                <td> {{ $rent->alamat}} </td>
                <td> {{ $rent->no_hp}} </td>
                <td> {{ $rent->lama_sewa}} </td>
                @forelse($mobil as $key => $value)
                    @if( $value->id == $rent->mobil_id)
                        <td value="{{ $value->id }}" selected> {{ $value->nama }}</td>
                    @endif
                    @empty
                @endforelse
                <td style="display: flex">
                    <a href="/sewa/{{$rent->id}}" class="btn btn-info btn-sm mr-2">Detail</a>
                    <a href="/sewa/{{$rent->id}}/edit" class="btn btn-default btn-sm mr-2">Edit</a>
                    <form action="/sewa/{{$rent->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="align= center; ">No Cast</td>
            </tr>
        @endforelse
            </tbody>
        </table>
    </div>
    </div>
    </section>
@endsection