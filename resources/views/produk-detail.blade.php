@extends('template.app')

@section('title', 'Detail Produk')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Detail Produk</h4>
  </div>
  <div class="card-body">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{ $produk->nama }}" readonly>
    </div>
    <div class="mb-3">
      <label for="satuan" class="form-label">Satuan</label>
      <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $produk->satuan }}" readonly>
    </div>
    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="text" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" readonly>
    </div>
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <input type="text" class="form-control" id="status" name="status" value="{{ $produk->status == 1 ? 'Active' : 'Inactive' }}" readonly>
    </div>
    <a href="{{ route('produk') }}" class="btn btn-custom-orange">Back</a>
  </div>
</div>
@endsection
