@extends('template.app')

@section('content')
  <button class="btn btn-success" onclick="add_array(62)">add</button>

  <form action="{{ route('stok_detail') }}" method="POST" id="stok_form">
    @csrf
    <input type="hidden" id="produk_array" name="produk_array" value="">
    <button class="btn btn-success" id="submit" type="submit">add</button>
  </form>

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
