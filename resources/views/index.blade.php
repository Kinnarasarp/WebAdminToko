@extends('template.app')

@section('dashboard_active', 'active')

@section('title', 'Web Toko')

@section('content')
  <div class="judul">
    <h1>Dashboard Admin</h1>
  </div>
  <div style="display: flex; justify-content: space-between; width: 100%; gap: 50px;">
    <div class="card shadow-none bg-transparent border border-primary mb-3" style="width: 50%;">
      <div class="card-body">
        <h5 class="card-title">Primary card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up.</p>
      </div>
    </div>
    <div class="card shadow-none bg-transparent border border-primary mb-3" style="width: 50%;">
      <div class="card-body">
        <h5 class="card-title">Primary card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up.</p>
      </div>
    </div>
  </div>

@endsection
