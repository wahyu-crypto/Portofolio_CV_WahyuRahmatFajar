@extends('rental.master')

@section('title')
<div class="content-wrapper">
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
      </div>
    </section>
@endsection

@section('content')

<div class="card card-primary ml-2 mr-2">
              <div class="card-header">
                <h3 class="card-title">Edit Customer : {{ $sewa->id }}</h3>
              </div>
              <form role="form" action="/sewa/{{ $sewa->id }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="nama" class="form-control" name="nama" id="nama" value="{{ old('nama', $sewa->nama) }}" placeholder="Enter Name Car">
                    @error('nama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="alamat">Address</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat', $sewa->alamat) }}" placeholder="Enter Address">
                    @error('alamat')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="no_hp">Number Phone</label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ old('no_hp', $sewa->no_hp) }}" placeholder="Enter Number Phone">
                    @error('no_hp')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="lama_sewa">Rent Time</label>
                    <div class="form-group">
                      <select name="lama_sewa" id="lama_sewa" class="form-control" value="{{ old('lama_sewa', $sewa->lama_sewa) }}" >
                        <option value="">Select Day</option>
                        <option value="1 Day">1 Day</option>
                        <option value="2 Day">2 Day</option>
                        <option value="3 Day">3 Day</option>
                      </select>
                    </div>
                    @error('lama_sewa')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="mobil_id">Name Car</label>
                    <div class="form-group">
                        <select id="mobil_id" class="form-control" name="mobil_id" onchange="price()">
                        <option value="">Select Car</option>
                        @foreach($mobil as $value)
                          @if ($value->id == $sewa->mobil_id)
                            <option value="{{ $value->id }}" selected> {{ $value->nama }} </option>
                          @else  
                            <option value="{{ $value->id }}"> {{ $value->nama }} </option>
                          @endif
                        @endforeach
                        </select>
                    </div>
                    @error('mobil_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <select id="harga" class="form-control" name="harga" disabled="disabled">
                        @foreach($mobil as $value)
                            @if($value->id == $sewa->mobil_id)
                              <option value="{{ $value->id }}" selected> {{ $value->harga }} </option>
                            @else
                              <option value="{{ $value->id }}"> {{ $value->harga }} </option>
                            @endif
                        @endforeach
                    @error('harga')
                      <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
              </form>
            </div>
@endsection

@push('scripts')
<script>
  function price() {
	var prc = document.getElementById("mobil_id").value;
        document.getElementById("harga").value=prc;
  }
</script>
@endpush