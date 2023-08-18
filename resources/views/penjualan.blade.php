@extends('template.app')
@section('penjualan_active', 'active')
@section('title', 'Web Toko')
@section('content')
<div class="row d-flex justify-content-evenly">
  @foreach ($produk as $item)
  <div class="col-3 card text-center mb-3">
    <div class="card-body">
      <p class="card-text">{{ $item->nama }}</p>
      <button type="button" class="btn btn-primary" onclick="add_array('{{ $item->id }}')">Go somewhere</button>
    </div>
  </div>
  @endforeach
  <form action="{{ route('cart') }}" method="POST">
    @csrf
    <input type="hidden" id="produk_array" name="produk_array" value="">
    <button class="btn btn-success" id="submit" type="submit">add</button>
  </form>
  <!-- Tombol Next -->
  <a href="#" class="next-button">
    Next
  </a>
</div>

<script>
  // console.log("ayam")
  var array_produk = [];

  function add_array(id) {
    $(document).ready(function() {
      array_produk.push(id);
      $("#produk_array").val(JSON.stringify(array_produk));
    });
  }
  // console.log(produk_array);
</script>
@endsection
<style>
  /* CSS untuk tombol Next */
  .next-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
    cursor: pointer;
    /* Menambahkan cursor pointer */
  }

  .next-button:hover {
    background-color: #0056b3;
  }
</style>