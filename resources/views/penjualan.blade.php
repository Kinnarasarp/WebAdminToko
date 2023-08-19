@extends('template.app')

@section('penjualan_active', 'active')

@section('title', 'Web Toko')

@section('content')
  @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <div class="row d-flex justify-content-evenly">
    @foreach ($produk as $item)
      <div class="col-3 card text-center mb-3">
        <div class="card-body">
          <p class="card-text">{{ $item->nama }}</p>
          <button type="button" class="btn btn-primary add_array" data-id="{{ $item->id }}" id="add_product"
            onclick="add_array('{{ $item->id }}')">Tambah
            Produk</button>
        </div>
      </div>

      <input type="hidden" id="id" value="{{ $item->id }}">
    @endforeach
    <div class="d-flex justify-content-center mt-5">
      <form action="{{ route('cart') }}" method="POST">
        @csrf
        <input type="hidden" id="produk_array" name="produk_array" value="">
        <button class="btn btn-primary" id="submit" type="submit">Next</button>
      </form>
    </div>
  </div>

  <script>
    var array_produk = [];

    function add_array(id) {
      console.log(array_produk);
      $(document).ready(function() {

        array_produk.push(id);
        var unique = array_produk.filter((value, index, array) => array.indexOf(value) === index);
        $("#produk_array").val(JSON.stringify(unique));
        console.log(unique);

        // $(`#add_product_${id}`).html("Hapus Produk");
        // $(`#add_product_${id}`).removeClass("btn-primary");
        // $(`#add_product_${id}`).addClass("btn-danger");
        // $("#submit").removeAttr("disabled");
        // $(`#add_product_${id}`).removeAttr(id);
        // $(`#add_product_${id}`).attr("id", `remove_product`);

      });
    }
  </script>
@endsection
