@extends('rental.master')

@section('title')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Show Data Customer</h1>
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
    @forelse($mobil as $key => $value)
      @if($value->id == $sewa->mobil_id)
        <img class="card-img-top" src="{{ asset('/img/'.$value->poster)}}" alt="Card image cap">
        <h1 value="{{ $value->id }}" selected>{{ $value->nama }}</h1>
      @endif
      @empty
    @endforelse
    <hr class="my-4">
    <h1>ABOUT CUSTOMER</h1>
    <hr class="my-4">
    <h3 class="lead">Name : {{ $sewa->nama}}</h3>
    <h3 class="lead">Address : {{ $sewa->alamat }}</h3>
    <h3 class="lead">Number Phone : {{ $sewa->no_hp }}</h3>
    <h3 class="lead" id="time" value="{{ $sewa->lama_sewa }}">Rent Time : {{ $sewa->lama_sewa }}</h3>
    @forelse($mobil as $key => $value)
      @if( $value->id == $sewa->mobil_id)
        <h3 class="lead" id="price" value="{{ $value->id }}"> Price / Day : {{ $value->harga }}</h3>
      @endif
      @empty
    @endforelse
    <hr class="my-4">
  </div>
@endsection


@push('scripts')
<script>
  
	var prc = document.getElementById("time").value;
  var prc2 = document.getElementById("price").value;
  
  var totals = prc * prc2;

  document.getElementById("total").value=totals;


</script>
@endpush
