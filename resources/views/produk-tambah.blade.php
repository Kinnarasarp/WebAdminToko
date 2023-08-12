@extends('template.app')

@section('title', 'Tambah Produk')

@section('produk_active', 'active')

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
        <h5 class="mb-0">Tambah Produk</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('produk-store') }}" method="POST">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="nama">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh : Tepung Terigu">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="satuan">Satuan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Contoh : 3">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="harga">Harga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="harga" name="harga" placeholder="Contoh : 5000">
            </div>
          </div>
        
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="status">Status</label>
              <div class="col-sm-10">
                <select class="form-control" id="status" name="status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection