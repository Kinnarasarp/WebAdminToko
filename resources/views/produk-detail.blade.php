@extends('template.app')

@section('title', 'Detail Produk')

@section('content')
<div class="my-2">
  <a href="{{ route('produk') }}" class="text-decoration-none text-black">
    <div class="back-button d-flex align-items-center">
      <i class='bx bx-chevron-left'></i>
      <p class="m-0">Back</p>
    </div>
  </a>
</div>
<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Detail Produk</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{ $produk->nama }}" readonly>
        </div>
        <div class="mb-3">
          <label for="stok" class="form-label">Stok</label>
          <input type="text" class="form-control" id="stok" name="stok" value="{{ $produk->stok }} {{ $produk->satuan }}" readonly>
        </div>
        <div class="mb-3">
          <label for="harga_beli" class="form-label">Harga Beli</label>
          <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="@currency($produk->harga_beli)" readonly>
        </div>
        <div class="mb-3">
          <label for="harga_jual" class="form-label">Harga Jual</label>
          <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="@currency($produk->harga_jual)" readonly>
        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <input type="text" class="form-control" id="status" name="status" value="{{ $produk->stok == 0 ? 'Habis' : ($produk->stok < 5 ? 'Menipis' : 'Tersedia') }}" readonly>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
