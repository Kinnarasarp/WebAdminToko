@extends('template.app')

@section('penjualan_active', 'active')

@section('title', 'Web Toko')

@section('content')
  <div class="d-flex flex-column justify-content-between h-100">
    @if (Session::has('error'))
      <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    {{-- @dd(count($produk)) --}}
    @if (count($produk) != 0)
      <div class="row m-0" style="overflow-y: auto; overflow-x: hidden; height: 73vh;">
        @foreach ($produk as $item)
          <div class="col-3 p-0">
            <div class="card mx-2 text-center mb-3">
              <div class="card-body">
                <p class="card-text m-0">{{ $item->nama }}</p>
                <p class="card-text">@currency($item->harga_jual)</p>
                <button type="button" class="btn btn-danger d-none" id="delete_product_{{ $item->id }}"
                  onclick="delete_array('{{ $item->id }}')">Hapus</button>
                <input type="hidden" id="unique">
                <button type="button" class="btn btn-primary add_array" id="add_product_{{ $item->id }}"
                  onclick="add_array('{{ $item->id }}')">Tambah
                  Produk</button>
              </div>
            </div>
          </div>

          <input type="hidden" id="id" value="{{ $item->id }}">
        @endforeach
      </div>
    @else
      <div class="alert alert-warning" role="alert">Tidak Ada Produk Tersedia !</div>
    @endif

    <footer class="w-auto footer p-3 bg-white" style="border-radius: 15px; position: sticky;">
      <div class="d-flex justify-content-between align-items-center">
        <div class="produk-selected">
          <p class="m-0" id="item-selected">0 Produk Terplih</p>
        </div>
        <form action="{{ route('cart') }}" method="POST">
          @csrf
          <input type="hidden" id="produk_array" name="produk_array" value="">
          <button class="btn btn-primary" id="submit" type="submit">Next</button>
        </form>
      </div>
    </footer>
  </div>

  <script>
    var array_produk = [];
    var unique = [];

    function add_array(id) {
      $(document).ready(function() {

        array_produk.push(id);
        var unique = array_produk.filter((value, index, array) => array.indexOf(value) === index);
        $("#produk_array").val(JSON.stringify(unique));
        $('#item-selected').html(unique.length + " Produk Terpilih");

        $('#add_product_' + id).toggleClass('d-none');
        $('#delete_product_' + id).toggleClass('d-none');
      });

    }

    function delete_array(id) {
      var unique = JSON.parse($('#produk_array').val());
      unique.splice(unique.indexOf(id), 1)
      array_produk = unique;
      $("#produk_array").val(JSON.stringify(unique));
      $('#item-selected').html(unique.length + " Produk Terpilih");
      $('#add_product_' + id).toggleClass('d-none');
      $('#delete_product_' + id).toggleClass('d-none');
    };
  </script>
@endsection
