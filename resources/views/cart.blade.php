@extends('template.app')
@section('penjualan_active', 'active')
@section('title', 'Web Toko')
@section('content')
<section>
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
          <h5 class="mb-0">Cart</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($produk_array as $id)
                @php
                  $item = App\Models\Produk::find($id);
                  $subtotal = $item->harga_jual;
                @endphp
                <tr>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->stok }}</td>
                  <td>{{ $item->satuan }}</td>
                  <td>{{ $item->harga_beli }}</td>
                  <td>{{ $item->harga_jual }}</td>
                  <td><input type="number" name="jumlah[]" value="1" class="form-control" onchange="updateSubtotal(this, '{{ $item->harga_jual }}')"></td>
                  <td class="subtotal">{{ $subtotal }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function updateSubtotal(input, harga) {
    var jumlah = input.value;
    var subtotal = jumlah * harga;
    input.parentNode.nextElementSibling.innerHTML = subtotal;
  }
</script>
@endsection
