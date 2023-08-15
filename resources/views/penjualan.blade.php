@extends('template.app')

@section('penjualan_active', 'active')

@section('title', 'Web Toko')

@section('content')
  <div class="row d-flex justify-content-evenly">
    @foreach ($produk as $item)
      <div class="col-3 card text-center mb-3">
        <div class="card-body">
          {{-- <h5 class="card-title">Special title treatment</h5> --}}
          <p class="card-text">{{ $item->nama }}</p>
          <a href="" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    @endforeach
  </div>
@endsection
