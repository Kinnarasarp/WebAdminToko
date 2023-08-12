@extends('template.app')

@section('title', 'Edit Produk')

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
        <h5 class="mb-0">Edit Produk</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('produk-update', $produk->id) }}" method="POST">
          @csrf
          @method('PUT') <!-- Gunakan method PUT untuk update data -->
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Produk"
              value="{{ $produk->nama }}">
          </div>
          <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan Produk"
              value="{{ $produk->satuan }}">
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Produk"
              value="{{ $produk->harga }}">
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
              <option value="1" {{ $produk->status == 1 ? 'selected' : '' }}>Active</option>
              <option value="0" {{ $produk->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
