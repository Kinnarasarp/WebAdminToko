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
          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
              <b>Input</b> Salah!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form action="{{ route('produk-store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="nama">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama"
                  placeholder="Contoh : Tepung Terigu">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="stok">Stok</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="stok" name="stok" placeholder="Contoh : 3">
              </div>
            </div>
            <div class="row mb-3">
              <label for="defaultSelect" class="col-2 col-form-label">Satuan</label>
              <div class="col-10">
                <select id="defaultSelect" class="form-select" name="satuan">
                  <option selected="true" disabled="disabled">~~Pilih Satuan~~</option>
                  <option value="liter">liter</option>
                  <option value="kg">kg</option>
                  <option value="pcs">pcs</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="harga_beli">Harga Beli</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Contoh : 5000">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="harga_jual">Harga Jual</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Contoh : 7000">
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
