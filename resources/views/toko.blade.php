@extends('template.app')

@section('title', 'Toko')

@section('toko_active', 'active')

@section('content')
  <div class="my-2">
    <a href="{{ route('dashboard') }}" class="text-decoration-none text-black">
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
          @if ($toko == null)
            <h5 class="mb-0">
              Tambah Toko
            </h5>
          @else
            <h5 class="mb-0">
              Edit Toko
            </h5>
          @endif
        </div>
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
              <b>Input</b> Salah!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form action="{{ route('toko-store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="nama">Nama Toko<span class="text-danger"> *</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Toko"
                  value="{{ $toko?->nama }}">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="alamat">Alamat<span class="text-danger"> *</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" required
                  placeholder="Alamat Toko" value="{{ $toko?->alamat }}">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="notelp">Nomor Telepon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Nomor Telepon"
                  value="{{ $toko?->notelp }}">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="instagram">Instagram</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram"
                  value="{{ $toko?->instagram }}">
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
